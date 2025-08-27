@extends('layouts.customize-admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.counter.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.counter.fields.id') }}
                        </th>
                        <td>
                            {{ $counter->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.counter.fields.title_en') }}
                        </th>
                        <td>
                            {{ $counter->title_en }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.counter.fields.sub_title_en') }}
                        </th>
                        <td>
                            {{ $counter->sub_title_en }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.counter.fields.number') }}
                        </th>
                        <td>
                            {{ $counter->number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.counter.fields.photo') }}
                        </th>
                        <td>
                            @if($counter->photo)
                                <img src="{{ $_SERVER['REMOTE_ADDR'] != "127.0.0.1" ? str_replace('localhost/storage', $_SERVER['SERVER_NAME'].'/system/storage/app/public' , $counter->photo->getUrl('thumb')) : str_replace('localhost', 'localhost:8000', $counter->photo->getUrl('thumb')) }}" width="100px">
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
