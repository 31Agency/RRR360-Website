<?php

namespace App\Http\Requests\OTP;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

class CheckOTPCodeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'otp'         => [
                'required',
            ],
        ];
    }
}
