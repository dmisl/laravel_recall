<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class MailVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check())
        {
            // if(Auth::user()->email_verified_at != null)
            // {
            //     dd('sup mane');
            // } else
            // {
            //     dd('not sup mane');
            // }
        } else
        {
            return redirect()->route('login.index');
        }

        return $next($request);
    }
}
