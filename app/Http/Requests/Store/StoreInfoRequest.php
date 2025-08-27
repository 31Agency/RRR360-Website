<?php

namespace App\Http\Requests\Store;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreInfoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('info_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
            'vision_en' => [
                'nullable',
                'string',
            ],
            'vision_ar' => [
                'nullable',
                'string',
            ],
            'about_description_en' => [
                'nullable',
                'string',
            ],
            'about_description_ar' => [
                'nullable',
                'string',
            ],
            'about_full_description_en' => [
                'nullable',
                'string',
            ],
            'about_full_description_ar' => [
                'nullable',
                'string',
            ],
            'service_en' => [
                'nullable',
                'string',
            ],
            'service_ar' => [
                'nullable',
                'string',
            ],
            'portfolio_en' => [
                'nullable',
                'string',
            ],
            'portfolio_ar' => [
                'nullable',
                'string',
            ],
            'address' => [
                'nullable',
                'string',
            ],
            'phone' => [
                'required',
                'string',
            ],
            'email' => [
                'required',
                'email',
            ],
        ];
    }
}
