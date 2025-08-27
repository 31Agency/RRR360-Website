<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request; // ✅ تأكد من استيراد Request
use Illuminate\Support\Str;
use PragmaRX\Google2FALaravel\Support\Authenticator;
use PragmaRX\Google2FA\Google2FA;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * المسار بعد تسجيل الدخول
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * التحقق بعد تسجيل الدخول
     */
    protected function authenticated(Request $request, $user)
    {
        if ($user->google2fa_secret) {
            $google2fa = new Google2FA();
            $google2fa->setAlgorithm('sha1');
            $user->two_fa_token = Str::random(32);
            $user->save();
            session(['authy_required' => true]);
            return redirect()->route('2fa.verify');
        }
        return redirect()->intended($this->redirectPath());
    }

    /**
     * إنشاء كائن جديد من الكنترولر
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
