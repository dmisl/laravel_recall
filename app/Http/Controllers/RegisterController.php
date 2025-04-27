<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;

class RegisterController extends Controller
{

    /**
     * Service handling user management logic.
     * 
     * @var UserService
     */
    protected UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Handles request sent from register form, validates incoming data,
     * and calls UserService to create new user.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'unique:users,name', 'min:3'],
            'email' => ['required', 'email', 'unique:users,email', 'min:8'],
            'password' => ['required', 'confirmed', 'min:6'],
        ]);
        
        $this->userService->create($request->all());

        return redirect()->route('profile.index');

    }
}
