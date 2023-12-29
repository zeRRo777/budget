<?php

namespace App\Http\Controllers\Main;

use App\Http\Requests\Main\AddYearRequest;
use App\Models\User;
use App\Models\Year;
use App\Services\MainService;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MainController
{
    private MainService $mainService;

    public function __construct(MainService $mainService){
        $this->mainService = $mainService;
    }
    public function index() {

        $years = Year::where('user_id', Auth::user()->id)->get();

        return view('main', compact('years'));
    }

    public function addYear(AddYearRequest $request) {
        $data = $request->validated();
        $data['user_id'] = Auth::user()->id;
        $response_json = $this->mainService->addYear($data);
        $response = json_decode($response_json->content(), true);
        if (isset($response['errorAdd'])) {
            return redirect()->route('main')->withErrors('name', $response['errorAdd']);
        }
        if (isset($response['successAdd'])) {
            return redirect()->route('main')->with('successAdd', $response['successAdd']);
        }
    }

    public function deleteYear(Year $year) {
        $year->delete();
        return redirect()->route('main')->with('successDelete', 'Год успешно удален!');
    }
}
