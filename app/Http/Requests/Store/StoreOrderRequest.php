<?php

namespace App\Http\Requests\Store;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreOrderRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('order_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'full_name' => [
                'required',
                'string',
                'max:255',
            ],
            'phone' => [
                'required',
                'string',
                'max:50',
            ],
            'email' => [
                'required',
                'email',
            ],
            'pickup_location' => [
                'required',
                'string',
                'max:255',
            ],
            'delivery_location' => [
                'required',
                'string',
                'max:255',
            ],
            'preferred_pickup_date' => [
                'required',
                'date',
            ],
            'notes' => [
                'nullable',
                'string',
                'max:100000',
            ],
        ];
    }
}
