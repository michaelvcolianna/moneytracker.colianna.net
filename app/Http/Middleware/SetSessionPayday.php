<?php

namespace App\Http\Middleware;

use App\Models\Payday;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetSessionPayday
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        session([
            'payday' => Payday::byDate(),
        ]);

        return $next($request);
    }
}
