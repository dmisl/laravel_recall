<?php

namespace App\Listeners;

use App\Events\UserVerified;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Redis;

class ClearRedisData
{
    
    public function __construct()
    {
        //
    }

    public function handle(UserVerified $event): void
    {
        Redis::del('verification_code:'.$event->user->email);
    }
}
