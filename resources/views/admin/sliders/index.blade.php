@extends('layouts.customize-admin')
@section('content')

    @can('slider_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.sliders.create") }}">
                    {{ trans('global.add') }} {{ trans('cruds.slider.title_singular') }}
                </a>
            </div>
        </div>
    @endcan


    <div class="card">
        <div class="card-header">
            Banner - Hello Section
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-slider">
                    <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.slider.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.slider.fields.title_en') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sliders as $key => $slider)
                        <tr data-entry-id="{{ $slider->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $slider->id ?? '' }}
                            </td>
                            <td>
                                {{ $slider->title_en ?? '' }}
                            </td>
                            <td>
                                @can('slider_edit')
                                    <a class="btn btn-xs btn-info"
                                       href="{{ route('admin.sliders.edit', $slider->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('slider_delete')
                                    <form action="{{ route('admin.sliders.destroy', $slider->id) }}" method="POST"
                                          onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                          style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger"
                                               value="{{ trans('global.delete') }}">
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
@endsection
@section('scripts')
    @parent
    <script>
        $(function () {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

            $.extend(true, $.fn.dataTable.defaults, {
                order: [[1, 'desc']],
                pageLength: 100,
            });
            $('.datatable-slider:not(.ajaxTable)').DataTable({buttons: dtButtons})
            $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });
        })

    </script>
@endsection
