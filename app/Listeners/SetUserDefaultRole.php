<?php

namespace App\Listeners;

use App\Events\UserVerified;
use App\Services\UserService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SetUserDefaultRole
{
    protected UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function handle(UserVerified $event): void
    {
        $this->userService->setDefaultRole($event->user);
    }
}
