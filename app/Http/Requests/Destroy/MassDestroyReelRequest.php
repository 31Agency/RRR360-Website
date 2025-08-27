<?php

namespace App\Http\Requests\Destroy;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyReelRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('reel_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:reels,id',
        ];
    }
}
