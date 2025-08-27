@extends('layouts.customize-admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.reel.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.reel.fields.id') }}
                        </th>
                        <td>
                            {{ $reel->id }}
                        </td>
                    </tr>
{{--                    <tr>--}}
{{--                        <th>--}}
{{--                            {{ trans('cruds.reel.fields.title_en') }}--}}
{{--                        </th>--}}
{{--                        <td>--}}
{{--                            {{ $reel->title_en }}--}}
{{--                        </td>--}}
{{--                    </tr>--}}
                    <tr>
                        <th>
                            {{ trans('cruds.reel.fields.title_ar') }}
                        </th>
                        <td>
                            {{ $reel->title_ar }}
                        </td>
                    </tr>
{{--                    <tr>--}}
{{--                        <th>--}}
{{--                            {{ trans('cruds.reel.fields.description_en') }}--}}
{{--                        </th>--}}
{{--                        <td>--}}
{{--                            {{ $reel->description_en }}--}}
{{--                        </td>--}}
{{--                    </tr>--}}
                    <tr>
                        <th>
                            {{ trans('cruds.reel.fields.description_ar') }}
                        </th>
                        <td>
                            {{ $reel->description_ar }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reel.fields.photo') }}
                        </th>
                        <td>
                            @if($reel->photo)
                                <img src="{{ $_SERVER['REMOTE_ADDR'] != "127.0.0.1" ? str_replace('localhost/storage', $_SERVER['SERVER_NAME'].'/system/storage/app/public' , $reel->photo->getUrl('thumb')) : str_replace('localhost', 'localhost:8000', $reel->photo->getUrl('thumb')) }}" width="100px">
                            @else
                                <img src="#" width="100px">
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reel.fields.video') }}
                        </th>
                        <td>
                            @if($reel->photo)
                                <a href="{{ $_SERVER['REMOTE_ADDR'] != "127.0.0.1" ? str_replace('localhost/storage', $_SERVER['SERVER_NAME'].'/system/storage/app/public' , $reel->video->getUrl('')) : str_replace('localhost', 'localhost:8000', $reel->video->getUrl('')) }}" target="_blank">
                                    Click here
                                </a>
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
