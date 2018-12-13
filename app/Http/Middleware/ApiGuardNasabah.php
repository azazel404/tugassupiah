<?php

namespace App\Http\Middleware;

use Closure;
use App\Nasabah;

class ApiGuardNasabah
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
        if (Nasabah::where('token', $request->token)->first()) {
            return $next($request);
        }

        return response()->json([
            'message' => 'NOT AUTHENTICATE',
            'status' => 401,
            'data' => []
         ]);
    }
}
