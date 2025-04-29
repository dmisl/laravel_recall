<?php

namespace App\Services;

use App\Mail\VerificationCodeMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;

class MailService
{
    
    public function sendVerificationCode($email)
    {

        $verificationCode = str_pad((string)random_int(0, pow(10, 6) - 1), 6, '0', STR_PAD_LEFT);

        Redis::set('verification_code:'.$email, $verificationCode);

        Mail::to($email)->send(new VerificationCodeMail($verificationCode));

    }

}
