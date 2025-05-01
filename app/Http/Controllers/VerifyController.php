<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\MailService;
use App\Services\UserService;
use App\Services\VerifyService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class VerifyController extends Controller
{

    protected VerifyService $verifyService;
    protected User $user;

    public function __construct(VerifyService $verifyService, UserService $userService)
    {
        $this->verifyService = $verifyService;
        $this->user = Auth::user();
    }

    /**
     * Returns view with email verification form
     */
    public function index()
    {
        $this->verifyService->sendVerificationCodeIfNeeded($this->user);

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

        if($this->verifyService->checkVerificationCode($this->user, $request->verificationCode))
        {
            return redirect()->route('profile.index');
        }

        return back();
        
    }
}
