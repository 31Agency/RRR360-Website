@extends('layouts.customize-admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.section.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.sections.update", [$section->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('type') ? 'has-error' : '' }}">
                <label for="type">{{ trans('cruds.section.fields.type') }}*</label>
                <select id="type" name="type" class="form-control select2" required>
                    <option value="checkbox" {{ old('type', isset($section) && $section->type == 'checkbox' ? 'selected' : '') }}>Checkbox</option>
                    <option value="dropdown_singular" {{ old('type', isset($section) && $section->type == 'dropdown_singular' ? 'selected' : '') }}>Dropdown singular</option>
                    <option value="dropdown_plural" {{ old('type', isset($section) && $section->type == 'dropdown_plural' ? 'selected' : '') }}>Dropdown plural</option>
                </select>
                @if($errors->has('type'))
                    <em class="invalid-feedback">
                        {{ $errors->first('type') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.section.fields.type_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('title_en') ? 'has-error' : '' }}">
                <label for="title_en">{{ trans('cruds.section.fields.title_en') }}*</label>
                <input type="text" id="title_en" name="title_en" class="form-control" value="{{ old('title_en', isset($section) ? $section->title_en : '') }}" required>
                @if($errors->has('title_en'))
                    <em class="invalid-feedback">
                        {{ $errors->first('title_en') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.section.fields.title_en_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection
