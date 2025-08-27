@extends('layouts.customize-admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} Why Us
    </div>

    <div class="card-body">
        <form action="{{ route("admin.tags.update", [$tag->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('title_en') ? 'has-error' : '' }}">
                <label for="title_en">{{ trans('cruds.tag.fields.title_en') }}*</label>
                <input type="text" id="title_en" name="title_en" class="form-control" value="{{ old('title_en', isset($tag) ? $tag->title_en : '') }}" required>
                @if($errors->has('title_en'))
                    <em class="invalid-feedback">
                        {{ $errors->first('title_en') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.tag.fields.title_en_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('title_ar') ? 'has-error' : '' }}">
                <label for="title_ar">{{ trans('cruds.tag.fields.title_ar') }}*</label>
                <input type="text" id="title_ar" name="title_ar" class="form-control" value="{{ old('title_ar', isset($tag) ? $tag->title_ar : '') }}" required>
                @if($errors->has('title_ar'))
                    <em class="invalid-feedback">
                        {{ $errors->first('title_ar') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.tag.fields.title_ar_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection
