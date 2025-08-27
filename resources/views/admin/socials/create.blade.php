@extends('layouts.customize-admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.social.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.socials.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
{{--            <div class="form-group {{ $errors->has('photo') ? 'has-error' : '' }}">--}}
{{--                <label for="photo">{{ trans('cruds.social.fields.photo') }}</label>--}}
{{--                <div class="needsclick dropzone" id="photo-dropzone">--}}

{{--                </div>--}}
{{--                @if($errors->has('photo'))--}}
{{--                    <em class="invalid-feedback">--}}
{{--                        {{ $errors->first('photo') }}--}}
{{--                    </em>--}}
{{--                @endif--}}
{{--                <p class="helper-block">--}}
{{--                    {{ trans('cruds.social.fields.photo_helper') }}--}}
{{--                </p>--}}
{{--            </div>--}}
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="title">{{ trans('cruds.social.fields.title') }}*</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title', isset($social) ? $social->title : '') }}" required>
                @if($errors->has('title'))
                    <em class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.social.fields.title_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('url') ? 'has-error' : '' }}">
                <label for="url">{{ trans('cruds.social.fields.url') }}*</label>
                <input type="url" id="url" name="url" class="form-control" value="{{ old('url', isset($social) ? $social->url : '') }}" required>
                @if($errors->has('url'))
                    <em class="invalid-feedback">
                        {{ $errors->first('url') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.social.fields.url_helper') }}
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
            url: '{{ route('admin.socials.storeMedia') }}',
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
                @if(isset($social) && $social->photo)
                var file = {!! json_encode($social->photo) !!}
                this.options.addedfile.call(this, file)
                this.options.thumbnail.call(this, file, '{{ $_SERVER['REMOTE_ADDR'] != "127.0.0.1" ? str_replace('localhost/storage', $_SERVER['SERVER_NAME'].'/system/storage/app/public' , $social->photo->getUrl('thumb')) : str_replace('localhost', 'localhost:8000', $social->photo->getUrl('thumb')) }}')
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
