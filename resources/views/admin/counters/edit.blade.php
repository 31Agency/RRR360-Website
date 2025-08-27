@extends('layouts.customize-admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.counter.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.counters.update", [$counter->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
{{--            <div class="form-group {{ $errors->has('photo') ? 'has-error' : '' }}">--}}
{{--                <label for="photo">{{ trans('cruds.counter.fields.photo') }}</label>--}}
{{--                <div class="needsclick dropzone" id="photo-dropzone">--}}

{{--                </div>--}}
{{--                @if($errors->has('photo'))--}}
{{--                    <em class="invalid-feedback">--}}
{{--                        {{ $errors->first('photo') }}--}}
{{--                    </em>--}}
{{--                @endif--}}
{{--                <p class="helper-block">--}}
{{--                    {{ trans('cruds.counter.fields.photo_helper') }}--}}
{{--                </p>--}}
{{--            </div>--}}
            <div class="form-group {{ $errors->has('title_en') ? 'has-error' : '' }}">
                <label for="title_en">{{ trans('cruds.counter.fields.title_en') }}*</label>
                <input type="text" id="title_en" name="title_en" class="form-control" value="{{ old('title_en', isset($counter) ? $counter->title_en : '') }}" required>
                @if($errors->has('title_en'))
                    <em class="invalid-feedback">
                        {{ $errors->first('title_en') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.counter.fields.title_en_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('title_ar') ? 'has-error' : '' }}">
                <label for="title_ar">{{ trans('cruds.counter.fields.title_ar') }}*</label>
                <input type="text" id="title_ar" name="title_ar" class="form-control" value="{{ old('title_ar', isset($counter) ? $counter->title_ar : '') }}" required>
                @if($errors->has('title_ar'))
                    <em class="invalid-feedback">
                        {{ $errors->first('title_ar') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.counter.fields.title_ar_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('sub_title_en') ? 'has-error' : '' }}">
                <label for="sub_title_en">{{ trans('cruds.counter.fields.sub_title_en') }}*</label>
                <input type="text" id="sub_title_en" name="sub_title_en" class="form-control" value="{{ old('sub_title_en', isset($counter) ? $counter->sub_title_en : '') }}" required>
                @if($errors->has('sub_title_en'))
                    <em class="invalid-feedback">
                        {{ $errors->first('sub_title_en') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.counter.fields.sub_title_en_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('sub_title_ar') ? 'has-error' : '' }}">
                <label for="sub_title_ar">{{ trans('cruds.counter.fields.sub_title_ar') }}*</label>
                <input type="text" id="sub_title_ar" name="sub_title_ar" class="form-control" value="{{ old('sub_title_ar', isset($counter) ? $counter->sub_title_ar : '') }}" required>
                @if($errors->has('sub_title_ar'))
                    <em class="invalid-feedback">
                        {{ $errors->first('sub_title_ar') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.counter.fields.sub_title_ar_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('number') ? 'has-error' : '' }}">
                <label for="number">{{ trans('cruds.counter.fields.number') }}*</label>
                <input type="number" min="1" step="1" id="number" name="number" class="form-control" value="{{ old('number', isset($counter) ? $counter->number : '') }}" required>
                @if($errors->has('number'))
                    <em class="invalid-feedback">
                        {{ $errors->first('number') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.counter.fields.number_helper') }}
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
            url: '{{ route('admin.counters.storeMedia') }}',
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
                @if(isset($counter) && $counter->photo)
                var file = {!! json_encode($counter->photo) !!}
                this.options.addedfile.call(this, file)
                this.options.thumbnail.call(this, file, '{{ $_SERVER['REMOTE_ADDR'] != "127.0.0.1" ? str_replace('localhost/storage', $_SERVER['SERVER_NAME'].'/system/storage/app/public' , $counter->photo->getUrl('thumb')) : str_replace('localhost', 'localhost:8000', $counter->photo->getUrl('thumb')) }}')
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
