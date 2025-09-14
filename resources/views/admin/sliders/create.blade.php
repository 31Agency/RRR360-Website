@extends('layouts.customize-admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.slider.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.sliders.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('picture') ? 'has-error' : '' }}">
                <label for="picture">{{ trans('cruds.slider.fields.picture') }}</label>
                <div class="needsclick dropzone" id="picture-dropzone">

                </div>
                @if($errors->has('picture'))
                    <em class="invalid-feedback">
                        {{ $errors->first('picture') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.slider.fields.picture_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('title_en') ? 'has-error' : '' }}">
                <label for="title_en">{{ trans('cruds.slider.fields.title_en') }}*</label>
                <input type="text" id="title_en" name="title_en" class="form-control" value="{{ old('title_en', isset($slider) ? $slider->title_en : '') }}" required>
                @if($errors->has('title_en'))
                    <em class="invalid-feedback">
                        {{ $errors->first('title_en') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.slider.fields.title_en_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('sub_title_en') ? 'has-error' : '' }}">
                <label for="sub_title_en">{{ trans('cruds.slider.fields.sub_title_en') }}*</label>
                <input type="text" id="sub_title_en" name="sub_title_en" class="form-control" value="{{ old('sub_title_en', isset($slider) ? $slider->sub_title_en : '') }}" required>
                @if($errors->has('sub_title_en'))
                    <em class="invalid-feedback">
                        {{ $errors->first('sub_title_en') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.slider.fields.sub_title_en_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('url') ? 'has-error' : '' }}">
                <label for="url">{{ trans('cruds.slider.fields.url') }}*</label>
                <input type="url" id="url" name="url" class="form-control" value="{{ old('url', isset($slider) ? $slider->url : '') }}" required>
                @if($errors->has('url'))
                    <em class="invalid-feedback">
                        {{ $errors->first('url') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.slider.fields.url_helper') }}
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
        Dropzone.options.pictureDropzone = {
            url: '{{ route('admin.sliders.storeMedia') }}',
            acceptedFiles: '.jpeg,.jpg,.png,.gif,.webp',
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function (file, response) {
                $('form').find('input[name="picture"]').remove()
                $('form').append('<input type="hidden" name="picture" value="' + response.name + '">')
            },
            removedfile: function (file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="picture"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function () {
                @if(isset($slider) && $slider->picture)
                var file = {!! json_encode($slider->picture) !!}
                this.options.addedfile.call(this, file)
                this.options.thumbnail.call(this, file, '{{ $_SERVER['REMOTE_ADDR'] != "127.0.0.1" ? str_replace('localhost/storage', $_SERVER['SERVER_NAME'].'/system/storage/app/public' , $slider->picture->getUrl('thumb')) : str_replace('localhost', 'localhost:8000', $slider->picture->getUrl('thumb')) }}')
                file.previewElement.classList.add('dz-complete')
                $('form').append('<input type="hidden" name="picture" value="' + file.file_name + '">')
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

        Dropzone.options.videoDropzone = {
            url: '{{ route('admin.sliders.storeMedia') }}',
            acceptedFiles: '.mp4',
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function (file, response) {
                $('form').find('input[name="video"]').remove()
                $('form').append('<input type="hidden" name="video" value="' + response.name + '">')
            },
            removedfile: function (file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="video"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function () {
                @if(isset($slider) && $slider->video)
                var file = {!! json_encode($slider->video) !!}
                this.options.addedfile.call(this, file)
                this.options.thumbnail.call(this, file, '{{ $_SERVER['REMOTE_ADDR'] != "127.0.0.1" ? str_replace('localhost/storage', $_SERVER['SERVER_NAME'].'/system/storage/app/public' , $slider->video->getUrl('thumb')) : str_replace('localhost', 'localhost:8000', $slider->video->getUrl('thumb')) }}')
                file.previewElement.classList.add('dz-complete')
                $('form').append('<input type="hidden" name="video" value="' + file.file_name + '">')
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
