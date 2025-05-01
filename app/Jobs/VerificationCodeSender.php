<?php

namespace App\Jobs;

use App\Models\User;
use App\Services\VerifyService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class VerificationCodeSender implements ShouldQueue
{
    use Queueable;

    protected User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function handle(VerifyService $verifyService): void
    {
        $verifyService->sendVerificationCode($this->user);
    }
}
