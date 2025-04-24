<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['string', 'min:3', 'exists:users,name'],
            'password' => ['string', 'min:6'],
        ]);

        if(Auth::attempt(['name' => $request->name, 'password' => $request->password]))
        {
            return redirect()->route('profile.index');
        }

        return back();

    }
}
