<?php

namespace Modules\Base\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BeforeEnvironmentExport
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (config('app.debug')) {
            \DB::enableQueryLog();
        }

        return $next($request);
    }
}
