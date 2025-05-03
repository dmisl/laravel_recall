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
            'password' => $data['password'],
            'email_verified_at' => null,
        ]);

        $this->authService->login($user);

        return $user;
    }

    public function setDefaultRole(User $user)
    {
        $user->update(['role' => 'default']);
    }

    public function markEmailAsVerified(User $user)
    {
        if(!$this->isEmailVerified($user))
        {
            $user->update([
                'email_verified_at' => now()
            ]);
        }
    }

    public function isEmailVerified(User $user)
    {
        if($user->email_verified_at !== null)
        {
            return true;
        }
        return false;
    }

}
