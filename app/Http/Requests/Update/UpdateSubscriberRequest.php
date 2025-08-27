<?php

namespace App\Http\Requests\Update;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateSubscriberRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('subscriber_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'email' => [
                'required',
                'unique:subscribers,email,' . request()->route('subscriber')->id,
            ],
            'name' => [
                'required',
                'unique:subscribers,name,' . request()->route('subscriber')->id,
            ],
            'phone' => [
                'required',
                'unique:subscribers,phone,' . request()->route('subscriber')->id,
            ],
            'message' => [
                'required',
                'string',
                'max:100000',
            ],
        ];
    }
}
