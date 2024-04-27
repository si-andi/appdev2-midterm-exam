<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductAccessMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
    $validToken = env('ACCESSCODE');

        $token = $request->bearerToken();
        if (!$token) {
            return response()->json([
               'error' => 'Token is missing'
            ], 401);
        }
        if ($token !== $validToken) {
            return response()->json([
                'error' => 'Invalid token'
            ], 401);
        }

    return $next($request);
    }
}
