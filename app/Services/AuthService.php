<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function attemptLogin(array $data)
    {
        if(Auth::attempt(['name' => $data['name'], 'password' => $data['password']]))
        {
            return redirect()->route('profile.index');
        }
    }

    public function logout()
    {
        Auth::logout();
    }
}
