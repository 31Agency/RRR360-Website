@extends('layouts.customize-admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.property.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.properties.update", [$property->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
                <label for="category_id">{{ trans('cruds.property.fields.category_id') }}*</label>
                <select id="category_id" name="category_id" class="form-control select2" required>
                    @foreach($categories as $id => $category)
                        <option value="{{ $id }}" {{ old('category_id', isset($property) && $property->category_id == $id ? 'selected' : '') }}>{{ $category }}</option>
                    @endforeach
                </select>
                @if($errors->has('category_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('category_id') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.property.fields.category_id_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('photos') ? 'has-error' : '' }}">
                <label for="photos">{{ trans('cruds.property.fields.photos') }}</label>
                <div class="needsclick dropzone" id="photos-dropzone">

                </div>
                @if($errors->has('photos'))
                    <p class="help-block">
                        {{ $errors->first('photos') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.property.fields.photos_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('title_en') ? 'has-error' : '' }}">
                <label for="title_en">{{ trans('cruds.property.fields.title_en') }}*</label>
                <input type="text" id="title_en" name="title_en" class="form-control" value="{{ old('title_en', isset($property) ? $property->title_en : '') }}" required>
                @if($errors->has('title_en'))
                    <em class="invalid-feedback">
                        {{ $errors->first('title_en') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.property.fields.title_en_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('title_ar') ? 'has-error' : '' }}">
                <label for="title_ar">{{ trans('cruds.property.fields.title_ar') }}*</label>
                <input type="text" id="title_ar" name="title_ar" class="form-control" value="{{ old('title_ar', isset($property) ? $property->title_ar : '') }}" required>
                @if($errors->has('title_ar'))
                    <em class="invalid-feedback">
                        {{ $errors->first('title_ar') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.property.fields.title_ar_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('location_en') ? 'has-error' : '' }}">
                <label for="location_en">{{ trans('cruds.property.fields.location_en') }}*</label>
                <input type="text" id="location_en" name="location_en" class="form-control" value="{{ old('location_en', isset($property) ? $property->location_en : '') }}" required>
                @if($errors->has('location_en'))
                    <em class="invalid-feedback">
                        {{ $errors->first('location_en') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.property.fields.location_en_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('location_ar') ? 'has-error' : '' }}">
                <label for="location_ar">{{ trans('cruds.property.fields.location_ar') }}*</label>
                <input type="text" id="location_ar" name="location_ar" class="form-control" value="{{ old('location_ar', isset($property) ? $property->location_ar : '') }}" required>
                @if($errors->has('location_ar'))
                    <em class="invalid-feedback">
                        {{ $errors->first('location_ar') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.property.fields.location_ar_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('description_en') ? 'has-error' : '' }}">
                <label for="description_en">{{ trans('cruds.property.fields.description_en') }}*</label>
                <textarea id="description_en" name="description_en" class="form-control summernote"
                          required>{{ old('description_en', isset($property) ? $property->description_en : '') }}</textarea>
                @if($errors->has('description_en'))
                    <em class="invalid-feedback">
                        {{ $errors->first('description_en') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.property.fields.description_en_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('description_ar') ? 'has-error' : '' }}">
                <label for="description_ar">{{ trans('cruds.property.fields.description_ar') }}*</label>
                <textarea id="description_ar" name="description_ar" class="form-control summernote"
                          required>{{ old('description_ar', isset($property) ? $property->description_ar : '') }}</textarea>
                @if($errors->has('description_ar'))
                    <em class="invalid-feedback">
                        {{ $errors->first('description_ar') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.property.fields.description_ar_helper') }}
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
        var uploadedPhotosMap = {}
        Dropzone.options.photosDropzone = {
            url: '{{ route('admin.properties.storeMedia') }}',

            acceptedFiles: '.jpeg,.jpg,.png,.gif,.webp',
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },

            success: function (file, response) {
                $('form').append('<input type="hidden" name="photos[]" value="' + response.name + '">')
                uploadedPhotosMap[file.name] = response.name
            },
            removedfile: function (file) {
                console.log(file)
                file.previewElement.remove()
                var name = ''
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name
                } else {
                    name = uploadedPhotosMap[file.name]
                }
                $('form').find('input[name="photos[]"][value="' + name + '"]').remove()
            },
            init: function () {
                @if(isset($property) && $property->photos)
                var files =
                    {!! json_encode($property->photos) !!}
                    for (var i in files) {
                    var file = files[i]
                    this.options.addedfile.call(this, file)
                    this.options.thumbnail.call(this, file, file.original_url.replace("http://localhost/storage", "{{ $_SERVER['REMOTE_ADDR'] != "127.0.0.1" ? asset("system/storage/app/public/") : "/storage" }}"))
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="photos[]" value="' + file.file_name + '">')
                }
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
