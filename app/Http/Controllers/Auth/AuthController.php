<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\AuthService;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    private AuthService $authService;

    public function __construct(AuthService $authService){
        $this->authService = $authService;
    }
    public function login(){
        return view('auth.login');
    }

    public function login_process(LoginRequest $request){
        if (Auth::attempt($request->validated()))
        {
            return redirect()->route('main');
        }
        return redirect()->route('login')->withErrors('Не правильный логин или пароль');
    }

    public function register(){
        return view('auth.register');
    }


    public function register_process(RegisterRequest $request){
        $user = $this->authService->register($request->validated());
        Auth::login($user, true);
        return redirect()->route('main');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
