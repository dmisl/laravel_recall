<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    protected UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'unique:users,name', 'min:3'],
            'email' => ['required', 'email', 'unique:users,email', 'min:8'],
            'password' => ['required', 'confirmed', 'min:6'],
        ]);
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);

        $user->sendEmailVerificationNotification();

        return redirect()->route('profile.index');

    }
}
