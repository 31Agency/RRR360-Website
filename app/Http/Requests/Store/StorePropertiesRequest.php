<?php

namespace App\Http\Requests\Store;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StorePropertiesRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('property_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'floor_id' => [
                'required',
                'exists:floors,id',
            ],
            'category_id' => [
                'required',
                'exists:categories,id',
            ],
            'furnishing_id' => [
                'required',
                'exists:furnishings,id',
            ],
            'system_id' => [
                'required',
                'exists:systems,id',
            ],
            'ref_no' => [
                'required',
                'unique:properties,ref_no',
            ],
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
            'map' => [
                'required',
                'string',
            ],
            'bedrooms' => [
                'required',
                'numeric',
            ],
            'bathrooms' => [
                'required',
                'numeric',
            ],
            'area' => [
                'required',
                'numeric',
            ],
            'specifications.*' => [
                'exists:specifications,id',
            ],
            'specifications'   => [
                'required',
                'array',
            ],
            'owners.*' => [
                'exists:specifications,id',
            ],
            'owners'   => [
                'required',
                'array',
            ],
        ];
    }
}
