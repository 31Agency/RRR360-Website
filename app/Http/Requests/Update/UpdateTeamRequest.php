<?php

namespace App\Http\Requests\Update;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateTeamRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('team_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name_en' => [
                'required',
                'string',
            ],
            'position' => [
                'required',
                'string',
            ],
            'facebook' => [
                'nullable',
                'string',
            ],
            'twitter' => [
                'nullable',
                'string',
            ],
            'linkedin' => [
                'nullable',
                'string',
            ],
            'instagram' => [
                'nullable',
                'string',
            ],
        ];
    }
}
