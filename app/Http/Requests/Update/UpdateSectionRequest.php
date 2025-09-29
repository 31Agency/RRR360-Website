<?php

namespace App\Http\Requests\Update;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateSectionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('section_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'type' => [
                'required',
                'in:dropdown_singular,dropdown_plural,checkbox',
            ],
            'title_en' => [
                'nullable',
                'string',
            ],
            'title_ar' => [
                'nullable',
                'string',
            ],
        ];
    }
}
