<?php

namespace App\Http\Controllers;

use App\Services\MailService;
use App\Services\VerifyService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class VerifyController extends Controller
{

    protected VerifyService $verifyService;

    public function __construct(VerifyService $verifyService)
    {
        $this->verifyService = $verifyService;
    }

    /**
     * Returns view with email verification form
     */
    public function index()
    {
        $this->verifyService->sendVerificationCode();

        return view('verify');
    }

    /**
     * Handles request sent from verification form,
     * checks if verification code sent to user`s email address match filled in input.
     * If verification codes match up - updates User model and redirects to the profile route.
     * 
     * @param Request $request Incoming request containing login credentials.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'verificationCode' => ['required', 'digits:6']
        ]);

        if($this->verifyService->checkVerificationCode($request->verificationCode))
        {
            return redirect()->route('profile.index');
        }

        return back();
        
    }
}
