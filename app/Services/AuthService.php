<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthService
{

    /**
     * Logins user using sent User model
     * 
     * @return null
     */
    public function login(User $user)
    {
        Auth::login($user);
    }

    /**
     * Attempts to authenticate user using provided credentials.
     * If successful, redirects to profile page.
     * 
     * @param array $data The user credentials (name and password).
     * @return bool
     */
    public function attemptLogin(array $data) : bool
    {
        if(Auth::attempt(['name' => $data['name'], 'password' => $data['password']]))
        {
            return true;
        } else
        {
            return false;
        }
    }

    /**
     * Logs out authenticated user
     * 
     * @return null
     */
    public function logout()
    {
        Auth::logout();
    }
}
