<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\OTP\CheckOTPCodeRequest;
use App\Mail\WelcomeMail;
use App\Models\User;
use App\Models\VerificationCode;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AuthOtpController extends Controller
{
    // Return View of OTP Login Page
    public function login()
    {
        return view('otp-verification');
    }

    // Generate OTP
    public function generate()
    {
        # Generate An OTP
        $verificationCode = $this->generateOtp(Auth::user()->email);

        $dataClient = ([
            'otp'       => "Your verification code is: <br>".$verificationCode->otp,
            'expire_at' => "This code is valid only for : ".date("h:i A", strtotime($verificationCode->expire_at)),
        ]);

        Mail::to(Auth::user()->email)->send(new WelcomeMail($dataClient));
        Mail::to("alaa@Starlet-IT.com")->send(new WelcomeMail($dataClient));

        return view('otp-verification')
            ->with([
            'user_id' => Auth::user()->id,
        ]);
    }

    public function generateOtp($email)
    {
        $user = User::where('email', $email)->first();

        # User Does not Have Any Existing OTP
        $verificationCode = VerificationCode::where('user_id', $user->id)->latest()->first();

        $now = Carbon::now();

        if($verificationCode && $now->isBefore($verificationCode->expire_at)){
            return $verificationCode;
        }

        // Create a New OTP
        return VerificationCode::create([
            'user_id'   => $user->id,
            'otp'       => rand(123456, 999999),
            'expire_at' => Carbon::now()->addMinutes(10)
        ]);
    }

    public function verification($user_id)
    {
        return view('otp-verification')->with([
            'user_id' => $user_id
        ]);
    }

    public function verificationWithOtp(CheckOTPCodeRequest $request)
    {
        #Validation Logic
        $verificationCode   = VerificationCode::where('user_id', Auth::user()->id)->where('otp', $request->otp)->first();

        $now = Carbon::now();
        if (!$verificationCode) {

            return redirect()->back()->with('message', 'Your OTP is not correct, we will send other OTP in your email');
        }
        elseif($verificationCode && $now->isAfter($verificationCode->expire_at))
        {
            return redirect()->back()->with('message', 'Your OTP has been expired, we will send other OTP in your email');
        }


        $user = Auth::user();

        if($user)
        {
            // Expire The OTP
            $verificationCode->update([
                'expire_at' => Carbon::now()
            ]);

            $device_id = md5($_SERVER['HTTP_USER_AGENT']);
            $user->update([
                'email_verified_at' => date("Y-m-d H:i:s"),
                'device_id'         => $device_id,
            ]);

            return redirect()->route('admin.home')->with('verification', 'Success');

        }

        return redirect()->back()->with('message', 'Your Otp is not correct - ' . $request);

    }
}
