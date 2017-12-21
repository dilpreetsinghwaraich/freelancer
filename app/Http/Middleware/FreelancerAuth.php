<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class FreelancerAuth
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
        if (!empty(Session::get('login_id')) && (Session::get('user_type') == 'freelancer')) 
        {
            return $next($request);
        }
        return redirect('login');
    }
}
