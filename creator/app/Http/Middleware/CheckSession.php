<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckSession
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->ajax() && !Session::has('_token')) {
            return response()->json(['error' => 'page-expired'], 419);
        }

        return $next($request);
    }
}
