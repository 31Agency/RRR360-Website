<?php

namespace App\Http\Requests\Update;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateLinkRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('link_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'title' => [
                'required',
                'string',
            ],
            'photo' => [
                'required',
                'string',
            ],
        ];
    }
}
