@extends('layouts.customize-admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} Our Projects
    </div>

    <div class="card-body">
        <form action="{{ route("admin.projects.update", [$project->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('photo') ? 'has-error' : '' }}">
                <label for="photo">{{ trans('cruds.project.fields.photo') }}</label>
                <div class="needsclick dropzone" id="photo-dropzone">

                </div>
                @if($errors->has('photo'))
                    <em class="invalid-feedback">
                        {{ $errors->first('photo') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.project.fields.photo_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('title_en') ? 'has-error' : '' }}">
                <label for="title_en">{{ trans('cruds.project.fields.title_en') }}*</label>
                <input type="text" id="title_en" name="title_en" class="form-control" value="{{ old('title_en', isset($project) ? $project->title_en : '') }}" required>
                @if($errors->has('title_en'))
                    <em class="invalid-feedback">
                        {{ $errors->first('title_en') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.project.fields.title_en_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('title_ar') ? 'has-error' : '' }}">
                <label for="title_ar">{{ trans('cruds.project.fields.title_ar') }}*</label>
                <input type="text" id="title_ar" name="title_ar" class="form-control" value="{{ old('title_ar', isset($project) ? $project->title_ar : '') }}" required>
                @if($errors->has('title_ar'))
                    <em class="invalid-feedback">
                        {{ $errors->first('title_ar') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.project.fields.title_ar_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('sub_title_en') ? 'has-error' : '' }}">
                <label for="sub_title_en">{{ trans('cruds.project.fields.sub_title_en') }}*</label>
                <input type="text" id="sub_title_en" name="sub_title_en" class="form-control" value="{{ old('sub_title_en', isset($project) ? $project->sub_title_en : '') }}" required>
                @if($errors->has('sub_title_en'))
                    <em class="invalid-feedback">
                        {{ $errors->first('sub_title_en') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.project.fields.sub_title_en_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('sub_title_ar') ? 'has-error' : '' }}">
                <label for="sub_title_ar">{{ trans('cruds.project.fields.sub_title_ar') }}*</label>
                <input type="text" id="sub_title_ar" name="sub_title_ar" class="form-control" value="{{ old('sub_title_ar', isset($project) ? $project->sub_title_ar : '') }}" required>
                @if($errors->has('sub_title_ar'))
                    <em class="invalid-feedback">
                        {{ $errors->first('sub_title_ar') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.project.fields.sub_title_ar_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('description_en') ? 'has-error' : '' }}">
                <label for="description_en">{{ trans('cruds.project.fields.description_en') }}*</label>
                <textarea id="description_en" name="description_en" class="form-control summernote" required>{{ old('description_en', isset($project) ? $project->description_en : '') }}</textarea>
                @if($errors->has('description_en'))
                    <em class="invalid-feedback">
                        {{ $errors->first('description_en') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.project.fields.description_en_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('description_ar') ? 'has-error' : '' }}">
                <label for="description_ar">{{ trans('cruds.project.fields.description_ar') }}*</label>
                <textarea id="description_ar" name="description_ar" class="form-control summernote" required>{{ old('description_ar', isset($project) ? $project->description_ar : '') }}</textarea>
                @if($errors->has('description_ar'))
                    <em class="invalid-feedback">
                        {{ $errors->first('description_ar') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.project.fields.description_ar_helper') }}
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
            url: '{{ route('admin.projects.storeMedia') }}',
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
                @if(isset($project) && $project->photo)
                var file = {!! json_encode($project->photo) !!}
                this.options.addedfile.call(this, file)
                this.options.thumbnail.call(this, file, '{{ $_SERVER['REMOTE_ADDR'] != "127.0.0.1" ? str_replace('localhost/storage', $_SERVER['SERVER_NAME'].'/system/storage/app/public' , $project->photo->getUrl('thumb')) : str_replace('localhost', 'localhost:8000', $project->photo->getUrl('thumb')) }}')
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

        Dropzone.options.documentDropzone = {
            url: '{{ route('admin.projects.storeMedia') }}',
            acceptedFiles: '.jpeg,.jpg,.png,.gif,.webp',
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function (file, response) {
                $('form').find('input[name="document"]').remove()
                $('form').append('<input type="hidden" name="document" value="' + response.name + '">')
            },
            removedfile: function (file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="document"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function () {
                @if(isset($project) && $project->document)
                var file = {!! json_encode($project->document) !!}
                this.options.addedfile.call(this, file)
                this.options.thumbnail.call(this, file, '{{ $_SERVER['REMOTE_ADDR'] != "127.0.0.1" ? str_replace('localhost/storage', $_SERVER['SERVER_NAME'].'/system/storage/app/public' , $project->document->getUrl('thumb')) : str_replace('localhost', 'localhost:8000', $project->document->getUrl('thumb')) }}')
                file.previewElement.classList.add('dz-complete')
                $('form').append('<input type="hidden" name="document" value="' + file.file_name + '">')
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
            url: '{{ route('admin.projects.storeMedia') }}',
            acceptedFiles: '.jpeg,.jpg,.png,.gif,.webp',
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
                @if(isset($project) && $project->video)
                var file = {!! json_encode($project->video) !!}
                this.options.addedfile.call(this, file)
                this.options.thumbnail.call(this, file, '{{ $_SERVER['REMOTE_ADDR'] != "127.0.0.1" ? str_replace('localhost/storage', $_SERVER['SERVER_NAME'].'/system/storage/app/public' , $project->video->getUrl('thumb')) : str_replace('localhost', 'localhost:8000', $project->video->getUrl('thumb')) }}')
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
