@extends('layouts.customize-admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.faq.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.faq.fields.id') }}
                        </th>
                        <td>
                            {{ $faq->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.faq.fields.title_en') }}
                        </th>
                        <td>
                            {{ $faq->title_en }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.faq.fields.title_ar') }}
                        </th>
                        <td>
                            {{ $faq->title_ar }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.faq.fields.description_en') }}
                        </th>
                        <td>
                            {{ $faq->description_en }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.faq.fields.description_ar') }}
                        </th>
                        <td>
                            {{ $faq->description_ar }}
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
