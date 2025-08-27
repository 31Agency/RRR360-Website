@extends('layouts.customize-admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.reel.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.reels.update", [$reel->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('photo') ? 'has-error' : '' }}">
                <label for="photo">{{ trans('cruds.reel.fields.photo') }}</label>
                <div class="needsclick dropzone" id="photo-dropzone">

                </div>
                @if($errors->has('photo'))
                    <em class="invalid-feedback">
                        {{ $errors->first('photo') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.reel.fields.photo_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('video') ? 'has-error' : '' }}">
                <label for="video">{{ trans('cruds.reel.fields.video') }}</label>
                <div class="needsclick dropzone" id="video-dropzone">

                </div>
                @if($errors->has('video'))
                    <em class="invalid-feedback">
                        {{ $errors->first('video') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.reel.fields.video_helper') }}
                </p>
            </div>
{{--            <div class="form-group {{ $errors->has('title_en') ? 'has-error' : '' }}">--}}
{{--                <label for="title_en">{{ trans('cruds.reel.fields.title_en') }}*</label>--}}
{{--                <input type="text" id="title_en" name="title_en" class="form-control" value="{{ old('title_en', isset($reel) ? $reel->title_en : '') }}" required>--}}
{{--                @if($errors->has('title_en'))--}}
{{--                    <em class="invalid-feedback">--}}
{{--                        {{ $errors->first('title_en') }}--}}
{{--                    </em>--}}
{{--                @endif--}}
{{--                <p class="helper-block">--}}
{{--                    {{ trans('cruds.reel.fields.title_en_helper') }}--}}
{{--                </p>--}}
{{--            </div>--}}
            <div class="form-group {{ $errors->has('title_ar') ? 'has-error' : '' }}">
                <label for="title_ar">{{ trans('cruds.reel.fields.title_ar') }}*</label>
                <input type="text" id="title_ar" name="title_ar" class="form-control" value="{{ old('title_ar', isset($reel) ? $reel->title_ar : '') }}" required>
                @if($errors->has('title_ar'))
                    <em class="invalid-feedback">
                        {{ $errors->first('title_ar') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.reel.fields.title_ar_helper') }}
                </p>
            </div>
{{--            <div class="form-group {{ $errors->has('description_en') ? 'has-error' : '' }}">--}}
{{--                <label for="description_en">{{ trans('cruds.reel.fields.description_en') }}*</label>--}}
{{--                <input type="text" id="description_en" name="description_en" class="form-control" value="{{ old('description_en', isset($reel) ? $reel->description_en : '') }}" required>--}}
{{--                @if($errors->has('description_en'))--}}
{{--                    <em class="invalid-feedback">--}}
{{--                        {{ $errors->first('description_en') }}--}}
{{--                    </em>--}}
{{--                @endif--}}
{{--                <p class="helper-block">--}}
{{--                    {{ trans('cruds.reel.fields.description_en_helper') }}--}}
{{--                </p>--}}
{{--            </div>--}}
            <div class="form-group {{ $errors->has('description_ar') ? 'has-error' : '' }}">
                <label for="description_ar">{{ trans('cruds.reel.fields.description_ar') }}*</label>
                <input type="text" id="description_ar" name="description_ar" class="form-control" value="{{ old('description_ar', isset($reel) ? $reel->description_ar : '') }}" required>
                @if($errors->has('description_ar'))
                    <em class="invalid-feedback">
                        {{ $errors->first('description_ar') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.reel.fields.description_ar_helper') }}
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
            url: '{{ route('admin.reels.storeMedia') }}',
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
                @if(isset($reel) && $reel->photo)
                var file = {!! json_encode($reel->photo) !!}
                this.options.addedfile.call(this, file)
                this.options.thumbnail.call(this, file, '{{ $_SERVER['REMOTE_ADDR'] != "127.0.0.1" ? str_replace('localhost/storage', $_SERVER['SERVER_NAME'].'/system/storage/app/public' , $reel->photo->getUrl('thumb')) : str_replace('localhost', 'localhost:8000', $reel->photo->getUrl('thumb')) }}')
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

        Dropzone.options.videoDropzone = {
            url: '{{ route('admin.reels.storeMedia') }}',
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
                @if(isset($reel) && $reel->video)
                var file = {!! json_encode($reel->video) !!}
                this.options.addedfile.call(this, file)
                this.options.thumbnail.call(this, file, '{{ $_SERVER['REMOTE_ADDR'] != "127.0.0.1" ? str_replace('localhost/storage', $_SERVER['SERVER_NAME'].'/system/storage/app/public' , $reel->video->getUrl('thumb')) : str_replace('localhost', 'localhost:8000', $reel->video->getUrl('thumb')) }}')
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
