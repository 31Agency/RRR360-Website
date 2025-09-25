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
            <div class="form-group {{ $errors->has('status_id') ? 'has-error' : '' }}">
                <label for="status_id">{{ trans('cruds.property.fields.status_id') }}*</label>
                <select id="status_id" name="status_id" class="form-control select2" required>
                    @foreach($statuses as $id => $status)
                        <option value="{{ $id }}" {{ old('status_id', isset($property) && $property->status_id == $id ? 'selected' : '') }}>{{ $status }}</option>
                    @endforeach
                </select>
                @if($errors->has('status_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('status_id') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.property.fields.status_id_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('furnishing_id') ? 'has-error' : '' }}">
                <label for="furnishing_id">{{ trans('cruds.property.fields.furnishing_id') }}*</label>
                <select id="furnishing_id" name="furnishing_id" class="form-control select2" required>
                    @foreach($furnishings as $id => $furnishing)
                        <option value="{{ $id }}" {{ old('furnishing_id', isset($property) && $property->furnishing_id == $id ? 'selected' : '') }}>{{ $furnishing }}</option>
                    @endforeach
                </select>
                @if($errors->has('furnishing_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('furnishing_id') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.property.fields.furnishing_id_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('system_id') ? 'has-error' : '' }}">
                <label for="system_id">{{ trans('cruds.property.fields.system_id') }}*</label>
                <select id="system_id" name="system_id" class="form-control select2" required>
                    @foreach($systems as $id => $system)
                        <option value="{{ $id }}" {{ old('system_id', isset($property) && $property->system_id == $id ? 'selected' : '') }}>{{ $system }}</option>
                    @endforeach
                </select>
                @if($errors->has('system_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('system_id') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.property.fields.system_id_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('floor_id') ? 'has-error' : '' }}">
                <label for="floor_id">{{ trans('cruds.property.fields.floor_id') }}*</label>
                <div>
                    @foreach($floors as $id => $floor)
                        <div class="form-check">
                            <input
                                type="radio"
                                id="floor_{{ $id }}"
                                name="floor_id"
                                value="{{ $id }}"
                                class="form-check-input"
                                {{ old('floor_id', isset($property) ? $property->floor_id : null) == $id ? 'checked' : '' }}
                                required
                            >
                            <label class="form-check-label" for="floor_{{ $id }}">
                                {{ $floor }}
                            </label>
                        </div>
                    @endforeach
                </div>

                @if($errors->has('floor_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('floor_id') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.property.fields.floor_id_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('specifications') ? 'has-error' : '' }}">
                <label for="specifications">
                    {{ trans('cruds.property.fields.specifications') }}*
                    <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span>
                </label>

                <div>
                    @foreach($sections as $key => $section)
                        <h5>{{ $section->title_en ?? '' }}</h5>
                        @foreach($section->specifications as $sub_key => $specification)
                            <div class="form-check">
                                <input
                                    type="checkbox"
                                    id="specification_{{ $specification->id }}"
                                    name="specifications[]"
                                    value="{{ $specification->id }}"
                                    class="form-check-input"
                                    {{ (in_array($specification->id, old('specifications', [])) || (isset($property) && $property->specifications->contains($specification->id))) ? 'checked' : '' }}
                                >
                                <label class="form-check-label" for="specification_{{ $specification->id }}">
                                    {{ $specification->title_en ?? '' }}
                                </label>
                            </div>
                        @endforeach
                    @endforeach
                </div>

                @if($errors->has('specifications'))
                    <em class="invalid-feedback">
                        {{ $errors->first('specifications') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.property.fields.specifications_helper') }}
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
            <div class="form-group {{ $errors->has('map') ? 'has-error' : '' }}">
                <label for="map">{{ trans('cruds.property.fields.map') }}*</label>
                <input type="text" id="map" name="map" class="form-control" value="{{ old('map', isset($property) ? $property->map : '') }}" required>
                @if($errors->has('map'))
                    <em class="invalid-feedback">
                        {{ $errors->first('map') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.property.fields.map_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('bedrooms') ? 'has-error' : '' }}">
                <label for="bedrooms">{{ trans('cruds.property.fields.bedrooms') }}*</label>
                <input type="number" step="1" min="1" id="bedrooms" name="bedrooms" class="form-control" value="{{ old('bedrooms', isset($property) ? $property->bedrooms : '') }}" required>
                @if($errors->has('bedrooms'))
                    <em class="invalid-feedback">
                        {{ $errors->first('bedrooms') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.property.fields.bedrooms_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('bathrooms') ? 'has-error' : '' }}">
                <label for="bathrooms">{{ trans('cruds.property.fields.bathrooms') }}*</label>
                <input type="number" step="1" min="1" id="bathrooms" name="bathrooms" class="form-control" value="{{ old('bathrooms', isset($property) ? $property->bathrooms : '') }}" required>
                @if($errors->has('bathrooms'))
                    <em class="invalid-feedback">
                        {{ $errors->first('bathrooms') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.property.fields.bathrooms_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('area') ? 'has-error' : '' }}">
                <label for="area">{{ trans('cruds.property.fields.area') }}*</label>
                <input type="number" step="1" min="1" id="area" name="area" class="form-control" value="{{ old('area', isset($property) ? $property->area : '') }}" required>
                @if($errors->has('area'))
                    <em class="invalid-feedback">
                        {{ $errors->first('area') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.property.fields.area_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('building_age') ? 'has-error' : '' }}">
                <label for="building_age">{{ trans('cruds.property.fields.building_age') }}*</label>
                <input type="text" id="building_age" name="building_age" class="form-control" value="{{ old('building_age', isset($property) ? $property->building_age : '') }}" required>
                @if($errors->has('building_age'))
                    <em class="invalid-feedback">
                        {{ $errors->first('building_age') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.property.fields.building_age_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                <label for="price">{{ trans('cruds.property.fields.price') }}*</label>
                <input type="number" step="0.001" min="1" id="price" name="price" class="form-control" value="{{ old('price', isset($property) ? $property->price : '0') }}" required>
                @if($errors->has('price'))
                    <em class="invalid-feedback">
                        {{ $errors->first('price') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.property.fields.price_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('price_per') ? 'has-error' : '' }}">
                <label for="price_per">{{ trans('cruds.property.fields.price_per') }}*</label>
                <select id="price_per" name="price_per" class="form-control" required>
                    <option value="daily" {{ old('price_per', isset($property) && $property->price_per == 'daily' ? 'selected' : '') }}>Daily</option>
                    <option value="monthly" {{ old('price_per', isset($property) && $property->price_per == 'monthly' ? 'selected' : '') }}>Monthly</option>
                    <option value="yearly" {{ old('price_per', isset($property) && $property->price_per == 'yearly' ? 'selected' : '') }}>Yearly</option>
                </select>
                @if($errors->has('price_per'))
                    <em class="invalid-feedback">
                        {{ $errors->first('price_per') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.property.fields.price_per_helper') }}
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
