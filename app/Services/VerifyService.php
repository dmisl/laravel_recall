<?php

namespace App\Services;

use App\Events\UserVerified;
use App\Jobs\VerificationCodeSender;
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

    public function sendVerificationCodeIfNeeded(User $user)
    {
        if(Redis::get('verification_code:'.$user->email) == null)
        {
            VerificationCodeSender::dispatch($user);
        }
    }

    public function sendVerificationCode(User $user)
    {
        $verificationCode = $this->generateVerificationCode();

        $this->mailService->send(VerificationCodeMail::class, $user->email, $verificationCode);

        Redis::setex('verification_code:'.$user->email, 600, $verificationCode);
    }

    public function checkVerificationCode(User $user, $verificationCode)
    {
        if(Redis::get('verification_code:'.$user->email) == $verificationCode)
        {
            $this->userService->markEmailAsVerified($user);
            UserVerified::dispatch($user);
            return true;
        }
        return false;
    }

    public function generateVerificationCode()
    {
        return str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
    }

}
