<?php

namespace App\Http\Requests\Update;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateRateRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('rate_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'title_en' => [
                'required',
                'string',
            ],
            'title_ar' => [
                'required',
                'string',
            ],
            'value' => [
                'required',
                'integer',
                'min:0',
            ],
        ];
    }
}
