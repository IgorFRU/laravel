<?php

namespace app\Http\Middleware;

use Closure;
use app\User;

class RedirectIfAdminIsset
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
        if (User::count()) {
            return redirect('/');
        }

        return $next($request);
    }
}
