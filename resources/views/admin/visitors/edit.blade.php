@extends('layouts.customize-admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.visitor.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.visitors.update", [$visitor->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('ip') ? 'has-error' : '' }}">
                <label for="ip">{{ trans('cruds.visitor.fields.ip') }}*</label>
                <input type="text" id="ip" name="ip" class="form-control" value="{{ old('ip', isset($visitor) ? $visitor->ip : '') }}" required>
                @if($errors->has('ip'))
                    <em class="invalid-feedback">
                        {{ $errors->first('ip') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.visitor.fields.ip_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection
