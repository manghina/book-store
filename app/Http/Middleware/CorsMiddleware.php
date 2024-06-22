<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CorsMiddleware
{

    protected $allowedOrigins = [
        'http://http://localhost:8080',
    ];

    public function handle(Request $request, Closure $next)
    {
        $origin = $request->headers->get('Origin');

        if (in_array($origin, $this->allowedOrigins)) {
            $response = $next($request);

            $response->headers->set('Access-Control-Allow-Origin', $origin);
            $response->headers->set('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
            $response->headers->set('Access-Control-Allow-Headers', 'Content-Type, X-Auth-Token, Authorization, Origin');

            // Handle preflight requests
            if ($request->getMethod() === "OPTIONS") {
                $response->setStatusCode(200);
                $response->headers->set('Access-Control-Allow-Headers', $request->header('Access-Control-Request-Headers'));
            }

            return $response;
        }

        return $next($request);
    }
}
