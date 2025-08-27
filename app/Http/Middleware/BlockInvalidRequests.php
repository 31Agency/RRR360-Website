<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BlockInvalidRequests
{
    public function handle(Request $request, Closure $next)
    {
        if (!$request->header('User-Agent')) {
            \Log::warning('تم حظر طلب بدون User-Agent من: ' . $request->ip());
            abort(403, 'Access Denied');
        }
        return $next($request);
    }
}
