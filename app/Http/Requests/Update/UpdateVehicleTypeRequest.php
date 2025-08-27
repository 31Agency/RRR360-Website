<?php

namespace App\Http\Requests\Update;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateVehicleTypeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('vehicle_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
        ];
    }
}
