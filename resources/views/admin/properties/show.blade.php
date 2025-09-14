@extends('layouts.customize-admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.property.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.property.fields.id') }}
                        </th>
                        <td>
                            {{ $property->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.specification.title_singular') }} {{ trans('global.list') }}
                        </th>
                        <td>
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class=" table table-bordered table-striped table-hover datatable datatable-specification" style="background: #353535!important;">
                                            <thead>
                                            <tr>
                                                <th width="10">
                                                    Select
                                                </th>
                                                <th>
                                                    {{ trans('cruds.specification.fields.id') }}
                                                </th>
                                                <th>
                                                    {{ trans('cruds.specification.fields.title_en') }}
                                                </th>
                                                <th>
                                                    Action
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($property->specifications as $key => $specification)
                                                <tr data-entry-id="{{ $specification->id }}">
                                                    <td>

                                                    </td>
                                                    <td>
                                                        {{ $specification->id ?? '' }}
                                                    </td>
                                                    <td>
                                                        {{ $specification->title_en ?? '' }}
                                                    </td>
                                                    <td>
                                                        @can('specification_show')
                                                            <a class="btn btn-xs btn-primary" href="{{ route('admin.specifications.show', $specification->id) }}">
                                                                {{ trans('global.view') }}
                                                            </a>
                                                        @endcan

                                                        @can('specification_edit')
                                                            <a class="btn btn-xs btn-info" href="{{ route('admin.specifications.edit', $specification->id) }}">
                                                                {{ trans('global.edit') }}
                                                            </a>
                                                        @endcan

                                                        @can('specification_delete')
                                                            <form action="{{ route('admin.specifications.destroy', $specification->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                                <input type="hidden" name="_method" value="DELETE">
                                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                            </form>
                                                        @endcan

                                                    </td>

                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    {{ trans('global.create') }} {{ trans('cruds.specification.title_singular') }}
                                </div>

                                <div class="card-body">
                                    <form action="{{ route("admin.specifications.store") }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" value="{{ $property->id ?? '' }}" name="property_id">
                                        <div class="form-group {{ $errors->has('title_en') ? 'has-error' : '' }}">
                                            <label for="title_en">{{ trans('cruds.specification.fields.title_en') }}*</label>
                                            <input type="text" id="title_en" name="title_en" class="form-control" value="{{ old('title_en') }}" required>
                                            @if($errors->has('title_en'))
                                                <em class="invalid-feedback">
                                                    {{ $errors->first('title_en') }}
                                                </em>
                                            @endif
                                            <p class="helper-block">
                                                {{ trans('cruds.specification.fields.title_en_helper') }}
                                            </p>
                                        </div>
                                        <div>
                                            <input class="btn btn-success" type="submit" value="{{ trans('global.save') }}">
                                        </div>
                                    </form>


                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.property.fields.category_id') }}
                        </th>
                        <td>
                            {{ $property->category->title_en ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.property.fields.title_en') }}
                        </th>
                        <td>
                            {{ $property->title_en }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.property.fields.description_en') }}
                        </th>
                        <td>
                            {!! $property->description_en !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.property.fields.photos') }}
                        </th>
                        <td>
                            @if($property->photo)
                                <img src="{{ $_SERVER['REMOTE_ADDR'] != "127.0.0.1" ? str_replace('localhost/storage', $_SERVER['SERVER_NAME'].'/system/storage/app/public' , $property->photo->getUrl('thumb')) : str_replace('localhost', 'localhost:8000', $property->photo->getUrl('thumb')) }}" width="100px">
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

@section('scripts')
    @parent
    <script>
        $(function () {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            @can('specification_delete')
            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.specifications.massDestroy') }}",
                className: 'btn-danger',
                action: function (e, dt, node, config) {
                    var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
                        return $(entry).data('entry-id')
                    });

                    if (ids.length === 0) {
                        alert('{{ trans('global.datatables.zero_selected') }}')

                        return
                    }

                    if (confirm('{{ trans('global.areYouSure') }}')) {
                        $.ajax({
                            headers: {'x-csrf-token': _token},
                            method: 'POST',
                            url: config.url,
                            data: { ids: ids, _method: 'DELETE' }})
                            .done(function () { location.reload() })
                    }
                }
            }
            dtButtons.push(deleteButton)
            @endcan

            $.extend(true, $.fn.dataTable.defaults, {
                order: [[ 1, 'desc' ]],
                pageLength: 100,
            });
            $('.datatable-specification:not(.ajaxTable)').DataTable({ buttons: dtButtons })
            $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });
        })

    </script>
@endsection
