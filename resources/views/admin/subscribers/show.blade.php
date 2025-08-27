@extends('layouts.customize-admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.subscriber.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.subscriber.fields.id') }}
                        </th>
                        <td>
                            {{ $subscriber->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.subscriber.fields.name') }}
                        </th>
                        <td>
                            {{ $subscriber->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.subscriber.fields.email') }}
                        </th>
                        <td>
                            {{ $subscriber->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.subscriber.fields.phone') }}
                        </th>
                        <td>
                            {{ $subscriber->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.subscriber.fields.message') }}
                        </th>
                        <td>
                            {{ $subscriber->message }}
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
