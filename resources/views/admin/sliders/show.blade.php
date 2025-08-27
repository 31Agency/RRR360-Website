@extends('layouts.customize-admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.slider.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.slider.fields.id') }}
                        </th>
                        <td>
                            {{ $slider->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.slider.fields.title_en') }}
                        </th>
                        <td>
                            {{ $slider->title_en }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.slider.fields.title_ar') }}
                        </th>
                        <td>
                            {{ $slider->title_ar }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.slider.fields.sub_title_en') }}
                        </th>
                        <td>
                            {{ $slider->sub_title_en }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.slider.fields.sub_title_ar') }}
                        </th>
                        <td>
                            {{ $slider->sub_title_ar }}
                        </td>
                    </tr>
{{--                    <tr>--}}
{{--                        <th>--}}
{{--                            {{ trans('cruds.slider.fields.description_en') }}--}}
{{--                        </th>--}}
{{--                        <td>--}}
{{--                            {{ $slider->description_en }}--}}
{{--                        </td>--}}
{{--                    </tr>--}}
{{--                    <tr>--}}
{{--                        <th>--}}
{{--                            {{ trans('cruds.slider.fields.description_ar') }}--}}
{{--                        </th>--}}
{{--                        <td>--}}
{{--                            {{ $slider->description_ar }}--}}
{{--                        </td>--}}
{{--                    </tr>--}}
                    <tr>
                        <th>
                            {{ trans('cruds.slider.fields.picture') }}
                        </th>
                        <td>
                            @if($slider->picture)
                                <a href="{{ $_SERVER['REMOTE_ADDR'] != "127.0.0.1" ? str_replace('localhost/storage', $_SERVER['SERVER_NAME'].'/system/storage/app/public' , $slider->picture->getUrl('')) : str_replace('localhost', 'localhost:8000', $slider->picture->getUrl('')) }}">
                                    Click here
                                </a>
                            @endif
                        </td>
                    </tr>
{{--                    <tr>--}}
{{--                        <th>--}}
{{--                            {{ trans('cruds.slider.fields.video') }}--}}
{{--                        </th>--}}
{{--                        <td>--}}
{{--                            @if($slider->video)--}}
{{--                                <a href="{{ $_SERVER['REMOTE_ADDR'] != "127.0.0.1" ? str_replace('localhost/storage', $_SERVER['SERVER_NAME'].'/system/storage/app/public' , $slider->video->getUrl('')) : str_replace('localhost', 'localhost:8000', $slider->video->getUrl('')) }}">--}}
{{--                                    Click here--}}
{{--                                </a>--}}
{{--                            @endif--}}
{{--                        </td>--}}
{{--                    </tr>--}}
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
