<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    protected AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    /**
     * Creates new user using validated credentials from controller,
     * after user creation authenticates user using AuthService method.
     * 
     * @param array $data The validated user data.
     * @return User $user
     */
    public function create(array $data): User
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password']
        ]);

        $this->authService->login($user);

        return $user;
    }
}
