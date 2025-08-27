<?php

namespace App\Http\Requests\Store;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreProjectRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('project_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'title_en' => [
                'nullable',
                'string',
            ],
            'title_ar' => [
                'nullable',
                'string',
            ],
            'sub_title_en' => [
                'nullable',
                'string',
            ],
            'sub_title_ar' => [
                'nullable',
                'string',
            ],
            'description_en' => [
                'nullable',
                'string',
            ],
            'description_ar' => [
                'nullable',
                'string',
            ],
            'photo' => [
                'required',
            ],
        ];
    }
}
