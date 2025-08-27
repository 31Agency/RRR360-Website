<?php

namespace App\Http\Requests\Store;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreSubscriberByGuestRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => [
                'required',
                'unique:subscribers,email',
            ],
            'name' => [
                'required',
                'unique:subscribers,name',
            ],
            'phone' => [
                'required',
                'unique:subscribers,phone',
            ],
            'message' => [
                'required',
                'string',
                'max:100000',
            ],
        ];
    }
}
