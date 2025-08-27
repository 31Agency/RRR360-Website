<?php

namespace App\Http\Requests\Update;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateSpecificationRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('specification_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'property_id' => [
                'required',
                'exists:properties,id',
            ],
            'title_en' => [
                'required',
                'string',
            ],
            'title_ar' => [
                'required',
                'string',
            ],
        ];
    }
}
