<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if (auth::check() && auth::user()->role === 'admin') {
            return $next($request);
        }

        abort(403, 'Unauthorized');
    }

}
