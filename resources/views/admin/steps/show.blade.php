@extends('layouts.customize-admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.step.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.step.fields.id') }}
                        </th>
                        <td>
                            {{ $step->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.step.fields.title_en') }}
                        </th>
                        <td>
                            {{ $step->title_en }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.step.fields.title_ar') }}
                        </th>
                        <td>
                            {{ $step->title_ar }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.step.fields.description_en') }}
                        </th>
                        <td>
                            {{ $step->description_en }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.step.fields.description_ar') }}
                        </th>
                        <td>
                            {{ $step->description_ar }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.step.fields.photo') }}
                        </th>
                        <td>
                            @if($step->photo)
                                <img src="{{ $_SERVER['REMOTE_ADDR'] != "127.0.0.1" ? str_replace('localhost/storage', $_SERVER['SERVER_NAME'].'/system/storage/app/public' , $step->photo->getUrl('thumb')) : str_replace('localhost', 'localhost:8000', $step->photo->getUrl('thumb')) }}" width="100px">
                            @else
                                <img src="#" width="100px">
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>

        <nav class="mb-3">
            <div class="nav nav-tabs">

            </div>
        </nav>
        <div class="tab-content">

        </div>
    </div>
</div>
@endsection
