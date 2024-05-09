<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class customerCheck
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

            if (auth('customer')->user()->usertype == 'customer')
            {
                //return redirect()-> route('admin.dashboard');
                return $next($request);
            }
            else
            {
               // return redirect('home')->with('error', 'You don\'tave admin access'); ->with so session send

                return redirect('/')->with('error','You don\'t have Customer Access!');
            }
        }


        return $next($request);
    }
    
}
