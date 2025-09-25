@extends('layouts.customize-admin')
@section('content')
@can('furnishing_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.furnishings.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.furnishing.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.furnishing.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-furnishing">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.furnishing.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.furnishing.fields.title_en') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($furnishings as $key => $furnishing)
                        <tr data-entry-id="{{ $furnishing->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $furnishing->id ?? '' }}
                            </td>
                            <td>
                                {{ $furnishing->title_en ?? '' }}
                            </td>
                            <td>
                                @can('furnishing_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.furnishings.show', $furnishing->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('furnishing_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.furnishings.edit', $furnishing->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('furnishing_delete')
                                    <form action="{{ route('admin.furnishings.destroy', $furnishing->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('furnishing_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.furnishings.massDestroy') }}",
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
  $('.datatable-furnishing:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection
