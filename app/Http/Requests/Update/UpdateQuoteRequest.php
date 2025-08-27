<?php

namespace App\Http\Requests\Update;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateQuoteRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('quote_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name_en' => [
                'required',
                'string',
            ],
            'position' => [
                'required',
                'string',
            ],
            'value' => [
                'required',
                'integer',
                'min:0',
            ],
            'description_en' => [
                'required',
                'string',
            ],
        ];
    }
}
