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
        auth()->user()->payday_id = Payday::byDate()->id;
        auth()->user()->save();

        return $next($request);
    }
}
