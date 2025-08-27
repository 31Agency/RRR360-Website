<?php

namespace App\Http\Requests\Store;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreFeedRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'full_name' => [
                'required',
                'string',
                'max:255',
            ],
            'email' => [
                'required',
                'email',
                'unique:feeds,email',
                'max:255',
            ],
            'subject' => [
                'required',
                'string',
                'max:255',
            ],
            'content' => [
                'required',
                'string',
                'max:10000',
            ],
        ];
    }
}
