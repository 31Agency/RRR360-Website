<?php

namespace App\Http\Requests\Store;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreSubscriberRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('subscriber_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
