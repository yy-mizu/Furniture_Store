<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class adminCheck
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

            if (auth('admin')->user()->usertype == 'admin')
            {
                // return redirect()-> route('adminDashboard');
                return $next($request);
            }
            else
            {
               // return redirect('home')->with('error', 'You don\'tave admin access'); ->with so session send

                return redirect('/')->with('error','You don\'t have Admin Access!');
            }
        }
        return $next($request);
    }


    
}
