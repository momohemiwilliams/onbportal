<?php

namespace App\Http\Middleware;

use Closure;

class SecurityHeaders
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
        $response = $next($request);

        // Example CSP: default-src 'self'; img-src *; script-src 'self' https://trustedsource.org
        $cspPolicy = "default-src 'self'; img-src *; script-src 'self' https://trustedsource.org";

        $response->headers->set('Content-Security-Policy', $cspPolicy);

        return $response;
    }
}
