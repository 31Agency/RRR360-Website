@extends('layouts.customize-admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.team.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.team.fields.id') }}
                        </th>
                        <td>
                            {{ $team->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.team.fields.name_en') }}
                        </th>
                        <td>
                            {{ $team->name_en }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.team.fields.position') }}
                        </th>
                        <td>
                            {{ $team->position }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.team.fields.facebook') }}
                        </th>
                        <td>
                            {{ $team->facebook }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.team.fields.twitter') }}
                        </th>
                        <td>
                            {{ $team->twitter }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.team.fields.linkedin') }}
                        </th>
                        <td>
                            {{ $team->linkedin }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.team.fields.instagram') }}
                        </th>
                        <td>
                            {{ $team->instagram }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.team.fields.photo') }}
                        </th>
                        <td>
                            @if($team->photo)
                                <img src="{{ $_SERVER['REMOTE_ADDR'] != "127.0.0.1" ? str_replace('localhost/storage', $_SERVER['SERVER_NAME'].'/system/storage/app/public' , $team->photo->getUrl('thumb')) : str_replace('localhost', 'localhost:8000', $team->photo->getUrl('thumb')) }}" width="100px">
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
