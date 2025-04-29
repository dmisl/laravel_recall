<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class VerifyController extends Controller
{
    /**
     * Returns view with email verification form
     */
    public function index()
    {
        return view('verify');
    }
    public function store(Request $request)
    {
        
    }
}
