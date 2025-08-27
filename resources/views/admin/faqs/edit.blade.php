@extends('layouts.customize-admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.faq.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.faqs.update", [$faq->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('title_en') ? 'has-error' : '' }}">
                <label for="title_en">{{ trans('cruds.faq.fields.title_en') }}*</label>
                <input type="text" id="title_en" name="title_en" class="form-control" value="{{ old('title_en', isset($faq) ? $faq->title_en : '') }}" required>
                @if($errors->has('title_en'))
                    <em class="invalid-feedback">
                        {{ $errors->first('title_en') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.faq.fields.title_en_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('title_ar') ? 'has-error' : '' }}">
                <label for="title_ar">{{ trans('cruds.faq.fields.title_ar') }}*</label>
                <input type="text" id="title_ar" name="title_ar" class="form-control" value="{{ old('title_ar', isset($faq) ? $faq->title_ar : '') }}" required>
                @if($errors->has('title_ar'))
                    <em class="invalid-feedback">
                        {{ $errors->first('title_ar') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.faq.fields.title_ar_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('description_en') ? 'has-error' : '' }}">
                <label for="description_en">{{ trans('cruds.faq.fields.description_en') }}*</label>
                <input type="text" id="description_en" name="description_en" class="form-control" value="{{ old('description_en', isset($faq) ? $faq->description_en : '') }}" required>
                @if($errors->has('description_en'))
                    <em class="invalid-feedback">
                        {{ $errors->first('description_en') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.faq.fields.description_en_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('description_ar') ? 'has-error' : '' }}">
                <label for="description_ar">{{ trans('cruds.faq.fields.description_ar') }}*</label>
                <input type="text" id="description_ar" name="description_ar" class="form-control" value="{{ old('description_ar', isset($faq) ? $faq->description_ar : '') }}" required>
                @if($errors->has('description_ar'))
                    <em class="invalid-feedback">
                        {{ $errors->first('description_ar') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.faq.fields.description_ar_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection
