<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CorsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $res = $next($request);

        $res->header->set('Access-Control-Allow-Origin', '*');
        $res->header->set('Access-Control-Allow-Method', 'POST, GET, OPTIONS, PUT, DELETE, PATCH');
        $res->header->set('Access-Control-Allow-Header', 'Content-Type', 'Authorization');

        return $res;
    }
}
