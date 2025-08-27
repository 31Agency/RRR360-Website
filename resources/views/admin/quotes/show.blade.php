@extends('layouts.customize-admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.quote.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.quote.fields.id') }}
                        </th>
                        <td>
                            {{ $quote->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.quote.fields.name_en') }}
                        </th>
                        <td>
                            {{ $quote->name_en }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.quote.fields.name_ar') }}
                        </th>
                        <td>
                            {{ $quote->name_ar }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.quote.fields.position') }}
                        </th>
                        <td>
                            {{ $quote->position }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.quote.fields.value') }}
                        </th>
                        <td>
                            {{ $quote->value }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.quote.fields.description_en') }}
                        </th>
                        <td>
                            {{ $quote->description_en }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.quote.fields.description_ar') }}
                        </th>
                        <td>
                            {{ $quote->description_ar }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.quote.fields.photo') }}
                        </th>
                        <td>
                            @if($quote->photo)
                                <img src="{{ $_SERVER['REMOTE_ADDR'] != "127.0.0.1" ? str_replace('localhost/storage', $_SERVER['SERVER_NAME'].'/system/storage/app/public' , $quote->photo->getUrl('thumb')) : str_replace('localhost', 'localhost:8000', $quote->photo->getUrl('thumb')) }}" width="100px">
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
