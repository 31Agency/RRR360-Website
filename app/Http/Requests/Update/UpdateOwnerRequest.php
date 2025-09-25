<?php

namespace App\Http\Requests\Update;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateOwnerRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('owner_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name' => [
                'required',
                'string',
            ],
            'email' => [
                'required',
                'email',
                'unique:owners,email,'.$this->route('owner')->id,
            ],
            'whatsapp' => [
                'required',
                'string',
                'unique:owners,whatsapp,'.$this->route('owner')->id,
            ],
            'mobile' => [
                'required',
                'string',
                'unique:owners,mobile,'.$this->route('owner')->id,
            ],
            'phone' => [
                'required',
                'string',
                'unique:owners,phone,'.$this->route('owner')->id,
            ],
        ];
    }
}
