<?php

namespace App\Listeners;

use App\Events\UserVerified;
use App\Mail\WelcomeMail;
use App\Services\MailService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class SendWelcomingEmail implements ShouldQueue
{
    protected MailService $mailService;

    public function __construct(MailService $mailService)
    {
        $this->mailService = $mailService;
    }

    /**
     * Handle the event.
     */
    public function handle(UserVerified $event): void
    {
        $this->mailService->send(WelcomeMail::class, $event->user->email, [$event->user->name, route('profile.index')]);
    }
}
