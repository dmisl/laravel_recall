<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    /**
     * Service handling authentication logic.
     *
     * @var AuthService
     */
    protected AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    /**
     * Returns view with sign in/up form
     */
    public function index()
    {
        return view('login');
    }

    /**
     * Handles request sent from login form, validates incoming data,
     * and calls AuthService to try authenticate the user.
     * 
     * @param Request $request Incoming request containing login credentials.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['string', 'min:3', 'exists:users,name'],
            'password' => ['string', 'min:6'],
        ]);

        if($this->authService->attemptLogin($request->all()))
        {
            redirect()->route('profile.index');
        } else
        {
            return back();
        }

    }

    /**
     * Logs out authenticated user
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        $this->authService->logout();
        return redirect()->route('login.index');
    }
}
