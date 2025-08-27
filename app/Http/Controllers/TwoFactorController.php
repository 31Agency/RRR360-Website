<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use PragmaRX\Google2FALaravel\Support\Authenticator;
use PragmaRX\Google2FAQRCode\Google2FA;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class TwoFactorController extends Controller
{
    public function show()
    {
        return view('2fa.verify');
    }

    public function verify(Request $request)
    {
        $user = auth()->user();

        $authenticator = app(Authenticator::class);
        $authenticator->boot($request);

        if ($authenticator->isAuthenticated()) {
            session(['authy_required' => false]);
            return redirect()->intended('/admin');
        }

        return back()->withErrors(['code' => 'Invalid 2FA code']);
    }

    public function enable()
    {
        $user = auth()->user();

        // ✅ تحقق إذا كان المستخدم قد فعّل 2FA سابقًا
        if ($user->google2fa_secret && session('authy_required') === false) {
            return redirect('/admin')->with('message', 'You have already enabled two-factor authentication.');
        }

        // ✅ إذا لم يكن لديه مفتاح، قم بإنشائه
        if (!$user->google2fa_secret) {
            $google2fa = new Google2FA();
            $google2fa->setAlgorithm('sha1'); // بعض التطبيقات تستخدم SHA1
            $user->google2fa_secret = $google2fa->generateSecretKey();
            $user->two_fa_token = Str::random(32);
            $user->save();
        }

        // ✅ إنشاء رمز QR
        $google2fa = new Google2FA();
        $QRImage = QrCode::size(200)->generate(
            $google2fa->getQRCodeUrl(
                config('app.name'),
                $user->email,
                $user->google2fa_secret
            )
        );

        return view('2fa.enable', compact('QRImage'));
    }
}
