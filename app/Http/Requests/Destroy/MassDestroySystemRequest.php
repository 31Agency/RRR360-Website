<?php

namespace App\Http\Requests\Destroy;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySystemRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('system_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:systems,id',
        ];
    }
}
