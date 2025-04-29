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
