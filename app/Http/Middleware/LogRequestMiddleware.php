<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;

class LogRequestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $method = $request->method();
        $url = $request->fullUrl();
        $data = $request->all()??null;

        Log::info("Request Method: $method");
        Log::info("Request URL: $url");
        Log::info("Sending Data:",$data);

        return $next($request);
    }
}
