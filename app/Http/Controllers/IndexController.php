<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        if (\Auth::check()){
            return redirect()->route('main');
        }else {
            return redirect()->route('login');
        }
    }
}
