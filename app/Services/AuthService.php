<?php

namespace App\Services;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthService {

    public function register($dataValidated): User
    {
        $dataValidated['password'] = Hash::make($dataValidated['password']);
        try {
            return DB::transaction(function () use ($dataValidated) {
                return User::create($dataValidated);
            });
        }catch (Exception $exception) {
            abort('500', message: $exception->getMessage());
        }
    }

    public function login($dataValidated){
        if (Auth::attempt($dataValidated))
        {
            return redirect()->route('main');
        }
        return redirect()->route('login')->withErrors('Не правильный логин или пароль');
    }



}

