<?php

namespace app\Http\Middleware;

use Closure;
use app\MyClasses\Cbr;
use Illuminate\Support\Facades\Cache;

class CurrencyRatesUpdate
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
        if (count(Cbr::getAssociate()) == 0) {
            $cbrToday = Cbr::today();
        }

        return $next($request);
    }
}
