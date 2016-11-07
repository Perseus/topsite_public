<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Account;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $account = Auth::user();
        if(Auth::check())
        {
            if($account->isAdmin())
                return $next($request);
        } 

        return redirect('home');
    }
}
