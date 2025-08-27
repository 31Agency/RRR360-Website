<?php

namespace App\Http\Requests\Store;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreSocialRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('social_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'title' => [
                'required',
                'string',
            ],
            'url' => [
                'required',
                'string',
            ],
//            'photo' => [
//                'required',
//            ],
        ];
    }
}
