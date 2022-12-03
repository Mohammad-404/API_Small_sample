<?php

namespace App\Http\Middleware;

use Closure;

class CheckPassword // i define it on kernel.php 
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
        if ($request->api_password !== env('API_PASSWORD','tVRRVMuxXSHsgkCrN')) {
            return response()->json(['message' => 'Unathintication']);
        }

        return $next($request);
    }
}
