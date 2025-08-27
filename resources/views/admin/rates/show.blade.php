@extends('layouts.customize-admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.rate.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.rate.fields.id') }}
                        </th>
                        <td>
                            {{ $rate->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rate.fields.title_en') }}
                        </th>
                        <td>
                            {{ $rate->title_en }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rate.fields.title_ar') }}
                        </th>
                        <td>
                            {{ $rate->title_ar }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rate.fields.value') }}
                        </th>
                        <td>
                            {{ $rate->value }}
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
