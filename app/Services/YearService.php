<?php

namespace App\Services;


use App\Models\Month;
use Illuminate\Support\Collection;

class YearService{

    public function addMonth($dataValidated){
        try {
            $existingMonth = Month::where('name', $dataValidated['name'])->where('year_id', $dataValidated['year_id'])->withTrashed()->first();
            if ($existingMonth){
                if ($existingMonth->trashed()){
                    $existingMonth->restore();
                }
                else{
                    return response()->json(['errorAdd' => 'Такой месяц уже существует']);
                }
            }else{
                \DB::transaction(function () use ($dataValidated){
                    Month::create($dataValidated);
                });
            }

            return response()->json(['successAdd' => 'Месяц успешно добавлен!']);

        }catch (\Exception $e){
            abort('500', $e->getMessage());
        }
    }


}
