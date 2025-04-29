<?php

namespace App\Services;

use App\Mail\VerificationCodeMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;

class MailService
{
    
    public function send($mailClass, $email, $data = '')
    {
        return Mail::to($email)->send(new $mailClass($data));
    }

}
