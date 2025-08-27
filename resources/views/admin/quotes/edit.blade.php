@extends('layouts.customize-admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.quote.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.quotes.update", [$quote->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('photo') ? 'has-error' : '' }}">
                <label for="photo">{{ trans('cruds.quote.fields.photo') }}</label>
                <div class="needsclick dropzone" id="photo-dropzone">

                </div>
                @if($errors->has('photo'))
                    <em class="invalid-feedback">
                        {{ $errors->first('photo') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.quote.fields.photo_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('name_en') ? 'has-error' : '' }}">
                <label for="name_en">{{ trans('cruds.quote.fields.name_en') }}*</label>
                <input type="text" id="name_en" name="name_en" class="form-control" value="{{ old('name_en', isset($quote) ? $quote->name_en : '') }}" required>
                @if($errors->has('name_en'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name_en') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.quote.fields.name_en_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('name_ar') ? 'has-error' : '' }}">
                <label for="name_ar">{{ trans('cruds.quote.fields.name_ar') }}*</label>
                <input type="text" id="name_ar" name="name_ar" class="form-control" value="{{ old('name_ar', isset($quote) ? $quote->name_ar : '') }}" required>
                @if($errors->has('name_ar'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name_ar') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.quote.fields.name_ar_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('position') ? 'has-error' : '' }}">
                <label for="position">{{ trans('cruds.quote.fields.position') }}*</label>
                <input type="text" id="position" name="position" class="form-control" value="{{ old('position', isset($quote) ? $quote->position : '') }}" required>
                @if($errors->has('position'))
                    <em class="invalid-feedback">
                        {{ $errors->first('position') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.quote.fields.position_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('value') ? 'has-error' : '' }} d-none">
                <label for="value">{{ trans('cruds.quote.fields.value') }}*</label>
                <input type="text" id="value" name="value" class="form-control" value="{{ old('value', isset($quote) ? $quote->value : '0') }}" required>
                @if($errors->has('value'))
                    <em class="invalid-feedback">
                        {{ $errors->first('value') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.quote.fields.value_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('description_en') ? 'has-error' : '' }}">
                <label for="description_en">{{ trans('cruds.quote.fields.description_en') }}*</label>
                <textarea id="description_en" name="description_en" class="form-control" required>{{ old('description_en', isset($quote) ? $quote->description_en : '') }}</textarea>
                @if($errors->has('description_en'))
                    <em class="invalid-feedback">
                        {{ $errors->first('description_en') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.quote.fields.description_en_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('description_ar') ? 'has-error' : '' }}">
                <label for="description_ar">{{ trans('cruds.quote.fields.description_ar') }}*</label>
                <textarea id="description_ar" name="description_ar" class="form-control" required>{{ old('description_ar', isset($quote) ? $quote->description_ar : '') }}</textarea>
                @if($errors->has('description_ar'))
                    <em class="invalid-feedback">
                        {{ $errors->first('description_ar') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.quote.fields.description_ar_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection
@section('scripts')
    <script>
        Dropzone.options.photoDropzone = {
            url: '{{ route('admin.quotes.storeMedia') }}',
            acceptedFiles: '.jpeg,.jpg,.png,.gif,.webp',
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function (file, response) {
                $('form').find('input[name="photo"]').remove()
                $('form').append('<input type="hidden" name="photo" value="' + response.name + '">')
            },
            removedfile: function (file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="photo"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function () {
                @if(isset($quote) && $quote->photo)
                var file = {!! json_encode($quote->photo) !!}
                this.options.addedfile.call(this, file)
                this.options.thumbnail.call(this, file, '{{ $_SERVER['REMOTE_ADDR'] != "127.0.0.1" ? str_replace('localhost/storage', $_SERVER['SERVER_NAME'].'/system/storage/app/public' , $quote->photo->getUrl('thumb')) : str_replace('localhost', 'localhost:8000', $quote->photo->getUrl('thumb')) }}')
                file.previewElement.classList.add('dz-complete')
                $('form').append('<input type="hidden" name="photo" value="' + file.file_name + '">')
                this.options.maxFiles = this.options.maxFiles - 1
                @endif
            },
            error: function (file, response) {
                if ($.type(response) === 'string') {
                    var message = response //dropzone sends it's own error messages in string
                } else {
                    var message = response.errors.file
                }
                file.previewElement.classList.add('dz-error')
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                _results = []
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i]
                    _results.push(node.textContent = message)
                }
                return _results
            }
        }
    </script>
@stop

