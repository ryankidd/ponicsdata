<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class ApiRequestLogging
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        Log::channel('single')->info('Incoming request:');
        Log::channel('single')->info($request);
        return $next($request);
    }

    /**
     * Handle a response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Http\JsonResponse  $response
     * @return void
     */
    public function terminate(Request $request, $response)
    {
        Log::channel('single')->info('Outgoing response:');
        Log::channel('single')->info($response);
    }
}