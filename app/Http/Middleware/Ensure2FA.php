<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Ensure2FA
{
    public function handle(Request $request, Closure $next)
    {
        // تحقق إذا كان المستخدم مسجل دخول
        if (!auth()->check()) {
            return redirect('/login'); // ✅ إعادة التوجيه إلى صفحة تسجيل الدخول
        }

        // إذا كان لديه 2FA مفعّل، ولم يُدخل الكود، امنعه
        if (auth()->user()->google2fa_secret && Session::get('authy_required', true)) {
            return redirect('/2fa/verify')->withErrors(['code' => 'يجب إدخال كود التحقق أولًا']);
        }
        if (auth()->user()->google2fa_secret == null || !isset(auth()->user()->google2fa_secret))
        {
            return redirect('/2fa/verify')->withErrors(['code' => 'يجب إدخال كود التحقق أولًا']);
        }

        return $next($request);
    }
}
