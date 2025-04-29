<?php

namespace App\Services;

use App\Mail\VerificationCodeMail;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class VerifyService
{
    
    protected MailService $mailService;
    protected $email;

    public function __construct(MailService $mailService)
    {
        $this->mailService = $mailService;
        $this->email = Auth::user()->email;
    }

    public function sendVerificationCode()
    {
        $verificationCode = $this->generateVerificationCode();

        Redis::set('verification_code:'.$this->email, $verificationCode);

        $this->mailService->send(VerificationCodeMail::class, $this->email, $verificationCode);
    }

    public function checkVerificationCode($verificationCode)
    {
        if(Redis::get('verification_code:'.$this->email) == $verificationCode)
        {
            return true;
        }
        return false;
    }

    public function generateVerificationCode()
    {
        return str_pad((string)random_int(0, pow(10, 6) - 1), 6, '0', STR_PAD_LEFT);
    }

}
