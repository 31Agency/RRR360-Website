@extends('layouts.customize-admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.gallery.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.gallery.fields.id') }}
                        </th>
                        <td>
                            {{ $gallery->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.gallery.fields.title_en') }}
                        </th>
                        <td>
                            {{ $gallery->title_en }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.gallery.fields.title_ar') }}
                        </th>
                        <td>
                            {{ $gallery->title_ar }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.gallery.fields.description_en') }}
                        </th>
                        <td>
                            {{ $gallery->description_en }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.gallery.fields.description_ar') }}
                        </th>
                        <td>
                            {{ $gallery->description_ar }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.gallery.fields.photo') }}
                        </th>
                        <td>
                            @if($gallery->photo)
                                <img src="{{ $_SERVER['REMOTE_ADDR'] != "127.0.0.1" ? str_replace('localhost/storage', $_SERVER['SERVER_NAME'].'/system/storage/app/public' , $gallery->photo->getUrl('thumb')) : str_replace('localhost', 'localhost:8000', $gallery->photo->getUrl('thumb')) }}" width="100px">
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
