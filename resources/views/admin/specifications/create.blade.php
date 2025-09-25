@extends('layouts.customize-admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.specification.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.specifications.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('section_id') ? 'has-error' : '' }}">
                <label for="section_id">{{ trans('cruds.specification.fields.section_id') }}*</label>
                <select id="section_id" name="section_id" class="form-control select2" required>
                    @foreach($sections as $id => $section)
                        <option value="{{ $id }}" {{ old('section_id', isset($specification) && $specification->section_id == $id ? 'selected' : '') }}>{{ $section }}</option>
                    @endforeach
                </select>
                @if($errors->has('section_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('section_id') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.specification.fields.section_id_helper') }}
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
