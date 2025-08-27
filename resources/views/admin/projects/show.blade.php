@extends('layouts.customize-admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.project.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.id') }}
                        </th>
                        <td>
                            {{ $project->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.title_en') }}
                        </th>
                        <td>
                            {{ $project->title_en }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.title_ar') }}
                        </th>
                        <td>
                            {{ $project->title_ar }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.sub_title_en') }}
                        </th>
                        <td>
                            {{ $project->sub_title_en }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.sub_title_ar') }}
                        </th>
                        <td>
                            {{ $project->sub_title_ar }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.description_en') }}
                        </th>
                        <td>
                            {{ $project->description_en }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.description_ar') }}
                        </th>
                        <td>
                            {{ $project->description_ar }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.photo') }}
                        </th>
                        <td>
                            @if($project->photo)
                                <img src="{{ $_SERVER['REMOTE_ADDR'] != "127.0.0.1" ? str_replace('localhost/storage', $_SERVER['SERVER_NAME'].'/system/storage/app/public' , $project->photo->getUrl('thumb')) : str_replace('localhost', 'localhost:8000', $project->photo->getUrl('thumb')) }}" width="100px">
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
