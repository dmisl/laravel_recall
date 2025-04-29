<?php

namespace App\Http\Controllers;

use App\Services\MailService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class VerifyController extends Controller
{

    protected MailService $mailService;

    public function __construct(MailService $mailService)
    {
        $this->mailService = $mailService;
    }

    /**
     * Returns view with email verification form
     */
    public function index()
    {
        $this->mailService->sendVerificationCode(Auth::user()->email);

        return view('verify');
    }
    public function store(Request $request)
    {
        
    }
}
