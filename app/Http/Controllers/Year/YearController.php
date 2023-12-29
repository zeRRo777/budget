<?php

namespace App\Http\Controllers\Year;

use App\Constants\Constants;
use App\Http\Controllers\Controller;
use App\Http\Requests\Year\AddMonthRequest;
use App\Models\Month;
use App\Models\Year;
use App\Services\YearService;
use App\View\Components\YearMonth;
use Illuminate\Http\Request;

class YearController extends Controller
{
    private YearService $yearService;

    public function __construct(YearService $yearService){
        $this->yearService = $yearService;
    }

    public function index(Year $year){

        $months = $year->months;
        $constMonths = Constants::MONTHS;

        return view('year', compact('year', 'months', 'constMonths'));
    }

    public function addMonth(AddMonthRequest $request, Year $year){
        $data = $request->validated();
        $data['year_id'] = $year->id;
        $data['name'] = Constants::MONTHS[$data['index']];
        dd($data);
        $response_json = $this->yearService->addMonth($data);
        $response = json_decode($response_json->content(), true);
        if (isset($response['errorAdd'])) {
            return redirect()->route('year', $year->id)->withErrors('name', $response['errorAdd']);
        }
        if (isset($response['successAdd'])) {
            return redirect()->route('year', $year->id)->with('successAdd', $response['successAdd']);
        }
    }

    public function deleteMonth(Year $year ,Month $month){
        dd($month);
        $month->delete();
        return redirect()->route('year', $year->id)->with('successDelete', 'Месяц успешно удален!');
    }
}
