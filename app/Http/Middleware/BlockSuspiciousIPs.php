<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\BlockedIP;
use Symfony\Component\HttpFoundation\Response;

class BlockSuspiciousIPs
{
    public function handle(Request $request, Closure $next): Response
    {
        $ip = $request->ip();

        if (BlockedIP::where('ip_address', $ip)->exists()) {
            return response()->json(['message' => 'تم حظر عنوان IP الخاص بك!'], 403);
        }

        return $next($request);
    }
}
