@extends('layouts.customize-admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.team.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.teams.update", [$team->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('photo') ? 'has-error' : '' }}">
                <label for="photo">{{ trans('cruds.team.fields.photo') }}</label>
                <div class="needsclick dropzone" id="photo-dropzone">

                </div>
                @if($errors->has('photo'))
                    <em class="invalid-feedback">
                        {{ $errors->first('photo') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.team.fields.photo_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('name_en') ? 'has-error' : '' }}">
                <label for="name_en">{{ trans('cruds.team.fields.name_en') }}*</label>
                <input type="text" id="name_en" name="name_en" class="form-control" value="{{ old('name_en', isset($team) ? $team->name_en : '') }}" required>
                @if($errors->has('name_en'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name_en') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.team.fields.name_en_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('position') ? 'has-error' : '' }}">
                <label for="position">{{ trans('cruds.team.fields.position') }}*</label>
                <input type="text" id="position" name="position" class="form-control" value="{{ old('position', isset($team) ? $team->position : '') }}" required>
                @if($errors->has('position'))
                    <em class="invalid-feedback">
                        {{ $errors->first('position') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.team.fields.position_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('facebook') ? 'has-error' : '' }}">
                <label for="facebook">{{ trans('cruds.team.fields.facebook') }}</label>
                <input type="url" id="facebook" name="facebook" class="form-control" value="{{ old('facebook', isset($team) ? $team->facebook : '') }}">
                @if($errors->has('facebook'))
                    <em class="invalid-feedback">
                        {{ $errors->first('facebook') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.team.fields.facebook_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('twitter') ? 'has-error' : '' }}">
                <label for="twitter">{{ trans('cruds.team.fields.twitter') }}</label>
                <input type="url" id="twitter" name="twitter" class="form-control" value="{{ old('twitter', isset($team) ? $team->twitter : '') }}">
                @if($errors->has('twitter'))
                    <em class="invalid-feedback">
                        {{ $errors->first('twitter') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.team.fields.twitter_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('linkedin') ? 'has-error' : '' }}">
                <label for="linkedin">{{ trans('cruds.team.fields.linkedin') }}</label>
                <input type="url" id="linkedin" name="linkedin" class="form-control" value="{{ old('linkedin', isset($team) ? $team->linkedin : '') }}">
                @if($errors->has('linkedin'))
                    <em class="invalid-feedback">
                        {{ $errors->first('linkedin') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.team.fields.linkedin_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('instagram') ? 'has-error' : '' }}">
                <label for="instagram">{{ trans('cruds.team.fields.instagram') }}</label>
                <input type="url" id="instagram" name="instagram" class="form-control" value="{{ old('instagram', isset($team) ? $team->instagram : '') }}">
                @if($errors->has('instagram'))
                    <em class="invalid-feedback">
                        {{ $errors->first('instagram') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.team.fields.instagram_helper') }}
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
            url: '{{ route('admin.teams.storeMedia') }}',
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
                @if(isset($team) && $team->photo)
                var file = {!! json_encode($team->photo) !!}
                this.options.addedfile.call(this, file)
                this.options.thumbnail.call(this, file, '{{ $_SERVER['REMOTE_ADDR'] != "127.0.0.1" ? str_replace('localhost/storage', $_SERVER['SERVER_NAME'].'/system/storage/app/public' , $team->photo->getUrl('thumb')) : str_replace('localhost', 'localhost:8000', $team->photo->getUrl('thumb')) }}')
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
