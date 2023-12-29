<?php

namespace App\Http\Controllers\Month;

use App\Http\Controllers\Controller;
use App\Models\Month;
use Illuminate\Http\Request;

class MonthController extends Controller
{
    public function index(Month $month){
        $year = $month->year;
       return view('month', compact('month', 'year'));
    }
}
