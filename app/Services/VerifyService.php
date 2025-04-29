<?php

namespace App\Services;

use App\Mail\VerificationCodeMail;
use App\Models\User;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class VerifyService
{
    
    protected MailService $mailService;
    protected UserService $userService;

    public function __construct(MailService $mailService, UserService $userService)
    {
        $this->mailService = $mailService;
        $this->userService = $userService;
    }

    public function sendVerificationCode(User $user)
    {
        $verificationCode = $this->generateVerificationCode();

        Redis::set('verification_code:'.$user->email, $verificationCode);

        $this->mailService->send(VerificationCodeMail::class, $user->email, $verificationCode);
    }

    public function checkVerificationCode(User $user, $verificationCode)
    {
        if(Redis::get('verification_code:'.$user->email) == $verificationCode)
        {
            $this->userService->markEmailAsVerified($user);
            return true;
        }
        return false;
    }

    public function generateVerificationCode()
    {
        return str_pad((string)random_int(0, pow(10, 6) - 1), 6, '0', STR_PAD_LEFT);
    }

}
