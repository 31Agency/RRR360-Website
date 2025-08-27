@extends('layouts.customize-admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.link.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.link.fields.id') }}
                        </th>
                        <td>
                            {{ $link->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.link.fields.title') }}
                        </th>
                        <td>
                            <a href="{{ $link->title }}" class="btn btn-xs btn-info m-1" target="_blank">Visit Link</a>
                            {{ $link->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.link.fields.photo') }}
                        </th>
                        <td>
                            @if($link->photo)
                                <img src="{{ $_SERVER['REMOTE_ADDR'] != "127.0.0.1" ? str_replace('localhost/storage', $_SERVER['SERVER_NAME'].'/system/storage/app/public' , $link->photo->getUrl('thumb')) : str_replace('localhost', 'localhost:8000', $link->photo->getUrl('thumb')) }}" width="100px">
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
