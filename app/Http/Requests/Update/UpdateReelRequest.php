<?php

namespace App\Http\Requests\Update;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateReelRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('reel_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
            'description_en' => [
                'nullable',
                'string',
            ],
            'description_ar' => [
                'nullable',
                'string',
            ],
        ];
    }
}
