@extends('layouts.customize-admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.specification.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.specifications.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('property_id') ? 'has-error' : '' }}">
                <label for="property_id">{{ trans('cruds.specification.fields.property_id') }}*</label>
                <select id="property_id" name="property_id" class="form-control select2" required>
                    @foreach($properties as $id => $property)
                        <option value="{{ $id }}" {{ old('property_id', isset($specification) && $specification->property_id == $id ? 'selected' : '') }}>{{ $property }}</option>
                    @endforeach
                </select>
                @if($errors->has('property_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('property_id') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.specification.fields.property_id_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('title_en') ? 'has-error' : '' }}">
                <label for="title_en">{{ trans('cruds.specification.fields.title_en') }}*</label>
                <input type="text" id="title_en" name="title_en" class="form-control" value="{{ old('title_en', isset($specification) ? $specification->title_en : '') }}" required>
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
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection
