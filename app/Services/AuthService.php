<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class AuthService
{
    /**
     * Attempts to authenticate user using provided credentials.
     * If successful, redirects to profile page.
     * 
     * @param array $data The user credentials (name and password).
     * @return \Illuminate\Http\RedirectResponse|null
     */
    public function attemptLogin(array $data)
    {
        if(Auth::attempt(['name' => $data['name'], 'password' => $data['password']]))
        {
            return redirect()->route('profile.index');
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
