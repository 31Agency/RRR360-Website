@extends('layouts.customize-admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.owner.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.owner.fields.id') }}
                        </th>
                        <td>
                            {{ $owner->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.owner.fields.name') }}
                        </th>
                        <td>
                            {{ $owner->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.owner.fields.email') }}
                        </th>
                        <td>
                            {{ $owner->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.owner.fields.whatsapp') }}
                        </th>
                        <td>
                            {{ $owner->whatsapp }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.owner.fields.mobile') }}
                        </th>
                        <td>
                            {{ $owner->mobile }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.owner.fields.phone') }}
                        </th>
                        <td>
                            {{ $owner->phone }}
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
