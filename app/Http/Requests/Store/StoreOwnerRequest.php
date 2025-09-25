<?php

namespace App\Http\Requests\Store;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreOwnerRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('owner_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name' => [
                'required',
                'string',
            ],
            'email' => [
                'required',
                'email',
                'unique:owners,email',
            ],
            'whatsapp' => [
                'required',
                'string',
                'unique:owners,whatsapp',
            ],
            'mobile' => [
                'required',
                'string',
                'unique:owners,mobile',
            ],
            'phone' => [
                'required',
                'string',
                'unique:owners,phone',
            ],
        ];
    }
}
