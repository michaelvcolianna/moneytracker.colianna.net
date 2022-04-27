<?php

namespace App\Http\Middleware;

use App\Models\PayDate;
use Closure;
use Illuminate\Http\Request;

class SetSessionPayDate
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
        session([
            'paydate' => PayDate::getCurrent(),
        ]);
        logger('Setting paydate: ' . session('paydate')->start->format('Y-m-d'), request()->all());

        return $next($request);
    }
}
