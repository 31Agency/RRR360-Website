<?php

namespace App\Http\Requests\Update;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdatePropertiesRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('property_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
            'status_id' => [
                'required',
                'exists:statuses,id',
            ],
            'furnishing_id' => [
                'required',
                'exists:furnishings,id',
            ],
            'ref_no' => [
                'required',
                'unique:properties,ref_no,'.$this->route('property')->id,
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
        ];
    }
}
