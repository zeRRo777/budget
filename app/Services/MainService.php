<?php

namespace App\Services;

use App\Models\Year;

class MainService{
    public function addYear($dataValidated){
        try {
            $existingYear = Year::where('name', $dataValidated['name'])->where('user_id', $dataValidated['user_id'])->withTrashed()->first();


            if ($existingYear){
                if ($existingYear->trashed()){
                    $existingYear->restore();
                }
                else{
                    return response()->json(['errorAdd' => 'Такой год уже существует']);
                }
            }else{
                \DB::transaction(function () use ($dataValidated){
                    Year::create($dataValidated);
                });
            }
            return response()->json(['successAdd' => 'Год успешно добавлен!']);

        }catch (\Exception $e){
            abort('500', $e->getMessage());
        }
    }
}
