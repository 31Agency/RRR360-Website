@extends('layouts.customize-admin')
@section('content')

    <style>
        .col-lg-12 .card-header
        {
            background-color: #d1a507;
            color: white
        }
    </style>
    <div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.property.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.properties.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                {{--                Basic Info--}}
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            Basic Info
                        </div>
                        <div class="card-body">
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
                            <div class="form-group {{ $errors->has('ref_no') ? 'has-error' : '' }}">
                                <label for="ref_no">{{ trans('cruds.property.fields.ref_no') }}*</label>
                                <input type="text" id="ref_no" name="ref_no" class="form-control" value="{{ old('ref_no', isset($property) ? $property->ref_no : '') }}" required>
                                @if($errors->has('ref_no'))
                                    <em class="invalid-feedback">
                                        {{ $errors->first('ref_no') }}
                                    </em>
                                @endif
                                <p class="helper-block">
                                    {{ trans('cruds.property.fields.ref_no_helper') }}
                                </p>
                            </div>
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
                            <div class="form-group {{ $errors->has('specifications') ? 'has-error' : '' }}">

                                <div id="specifications-wrapper">
                                    @php
                                        // مصفوفة القيم المحددة مسبقاً
                                        $selectedSpecs = old('specifications', isset($property) ? $property->specifications->pluck('id')->toArray() : []);
                                    @endphp

                                    @foreach($sections->where('id', 6) as $section)
                                        <div class="mb-3 section-block" data-section-type="{{ $section->type }}">
                                            <label for="specifications">
                                                {{ $section->title_en ?? '' }}*
                                            </label>
                                            @if($section->type === 'checkbox')
                                                @foreach($section->specifications as $spec)
                                                    <div class="form-check">
                                                        @php $id = 'spec_'.$spec->id; @endphp
                                                        <input
                                                            type="checkbox"
                                                            id="{{ $id }}"
                                                            name="specifications[]"
                                                            value="{{ $spec->id }}"
                                                            class="form-check-input"
                                                            {{ in_array($spec->id, $selectedSpecs, true) ? 'checked' : '' }}
                                                        >
                                                        <label class="form-check-label" for="{{ $id }}">
                                                            {{ $spec->title_en ?? '' }}
                                                        </label>
                                                    </div>
                                                @endforeach

                                            @elseif($section->type === 'dropdown_plural')
                                                @php
                                                    $sectionSelected = array_values(array_intersect(
                                                        $selectedSpecs,
                                                        $section->specifications->pluck('id')->toArray()
                                                    ));
                                                @endphp

                                                <select
                                                    name="specifications[]"
                                                    class="form-control select2 section-select"
                                                    multiple="multiple"
                                                    data-placeholder="Please select"
                                                >
                                                    @foreach($section->specifications as $spec)
                                                        <option value="{{ $spec->id }}" {{ in_array($spec->id, $sectionSelected, true) ? 'selected' : '' }}>
                                                            {{ $spec->title_en ?? '' }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                            @elseif($section->type === 'dropdown_singular')
                                                @php
                                                    // اختَر أول قيمة من المحدد ضمن مواصفات هذا السيكشن (إن وجدت)
                                                    $firstSelected = collect($section->specifications)->pluck('id')->intersect($selectedSpecs)->first();
                                                @endphp

                                                <select
                                                    name="specifications[]"
                                                    class="form-control select2 section-select"
                                                    data-placeholder="Please select">
                                                    <option value="">Please select</option>
                                                    @foreach($section->specifications as $spec)
                                                        <option value="{{ $spec->id }}" {{ (int)$firstSelected === (int)$spec->id ? 'selected' : '' }}>
                                                            {{ $spec->title_en ?? '' }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>

                                @if($errors->has('specifications'))
                                    <em class="invalid-feedback d-block">
                                        {{ $errors->first('specifications') }}
                                    </em>
                                @endif

                                <p class="helper-block">
                                    {{ trans('cruds.property.fields.specifications_helper') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                {{--                Location Details--}}
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            Location Details
                        </div>
                        <div class="card-body">
                            <div class="form-group {{ $errors->has('specifications') ? 'has-error' : '' }}">

                                <div id="specifications-wrapper">
                                    @php
                                        // مصفوفة القيم المحددة مسبقاً
                                        $selectedSpecs = old('specifications', isset($property) ? $property->specifications->pluck('id')->toArray() : []);
                                    @endphp

                                    @foreach($sections->whereIN('id', [11, 12, 13]) as $section)
                                        @if($section->type === 'checkbox')
                                            @foreach($section->specifications as $spec)
                                                <div class="form-check">
                                                    @php $id = 'spec_'.$spec->id; @endphp
                                                    <input
                                                        type="checkbox"
                                                        id="{{ $id }}"
                                                        name="specifications[]"
                                                        value="{{ $spec->id }}"
                                                        class="form-check-input"
                                                        {{ in_array($spec->id, $selectedSpecs, true) ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="{{ $id }}">
                                                        {{ $spec->title_en ?? '' }}
                                                    </label>
                                                </div>
                                            @endforeach

                                        @elseif($section->type === 'dropdown_plural')
                                            @php
                                                $sectionSelected = array_values(array_intersect(
                                                    $selectedSpecs,
                                                    $section->specifications->pluck('id')->toArray()
                                                ));
                                            @endphp

                                            <select
                                                name="specifications[]"
                                                class="form-control select2 section-select"
                                                multiple="multiple"
                                                data-placeholder="Please select"
                                            >
                                                @foreach($section->specifications as $spec)
                                                    <option value="{{ $spec->id }}" {{ in_array($spec->id, $sectionSelected, true) ? 'selected' : '' }}>
                                                        {{ $spec->title_en ?? '' }}
                                                    </option>
                                                @endforeach
                                            </select>

                                        @elseif($section->type === 'dropdown_singular')
                                            @php
                                                // اختَر أول قيمة من المحدد ضمن مواصفات هذا السيكشن (إن وجدت)
                                                $firstSelected = collect($section->specifications)->pluck('id')->intersect($selectedSpecs)->first();
                                            @endphp

                                            <select
                                                name="specifications[]"
                                                class="form-control select2 section-select"
                                                data-placeholder="Please select">
                                                <option value="">Please select</option>
                                                @foreach($section->specifications as $spec)
                                                    <option value="{{ $spec->id }}" {{ (int)$firstSelected === (int)$spec->id ? 'selected' : '' }}>
                                                        {{ $spec->title_en ?? '' }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        @endif
                                        <hr>
                                    @endforeach
                                </div>

                                @if($errors->has('specifications'))
                                    <em class="invalid-feedback d-block">
                                        {{ $errors->first('specifications') }}
                                    </em>
                                @endif

                                <p class="helper-block">
                                    {{ trans('cruds.property.fields.specifications_helper') }}
                                </p>
                            </div>
                            <div class="form-group {{ $errors->has('street_name') ? 'has-error' : '' }}">
                                <label for="street_name">{{ trans('cruds.property.fields.street_name') }}*</label>
                                <input type="text" id="street_name" name="street_name" class="form-control" value="{{ old('street_name', isset($property) ? $property->street_name : '') }}" required>
                                @if($errors->has('street_name'))
                                    <em class="invalid-feedback">
                                        {{ $errors->first('street_name') }}
                                    </em>
                                @endif
                                <p class="helper-block">
                                    {{ trans('cruds.property.fields.street_name_helper') }}
                                </p>
                            </div>
                            <div class="form-group {{ $errors->has('latitude') ? 'has-error' : '' }}">
                                <label for="latitude">{{ trans('cruds.property.fields.latitude') }}*</label>
                                <input type="number" step="0.0000001" min="0" id="latitude" name="latitude" class="form-control" value="{{ old('latitude', isset($property) ? $property->latitude : '') }}" required>
                                @if($errors->has('latitude'))
                                    <em class="invalid-feedback">
                                        {{ $errors->first('latitude') }}
                                    </em>
                                @endif
                                <p class="helper-block">
                                    {{ trans('cruds.property.fields.latitude_helper') }}
                                </p>
                            </div>
                            <div class="form-group {{ $errors->has('longitude') ? 'has-error' : '' }}">
                                <label for="longitude">{{ trans('cruds.property.fields.longitude') }}*</label>
                                <input type="number" step="0.0000001" min="0" id="longitude" name="longitude" class="form-control" value="{{ old('longitude', isset($property) ? $property->longitude : '') }}" required>
                                @if($errors->has('longitude'))
                                    <em class="invalid-feedback">
                                        {{ $errors->first('longitude') }}
                                    </em>
                                @endif
                                <p class="helper-block">
                                    {{ trans('cruds.property.fields.longitude_helper') }}
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
                        </div>
                    </div>
                </div>
                {{--                Property Specs--}}
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            Property Specs
                        </div>
                        <div class="card-body">
                            <div class="form-group {{ $errors->has('specifications') ? 'has-error' : '' }}">

                                <div id="specifications-wrapper">
                                    @php
                                        // مصفوفة القيم المحددة مسبقاً
                                        $selectedSpecs = old('specifications', isset($property) ? $property->specifications->pluck('id')->toArray() : []);
                                    @endphp

                                    @foreach($sections->whereIN('id', [5]) as $section)
                                        <div class="mb-3 section-block" data-section-type="{{ $section->type }}">
                                            <label for="specifications">
                                                {{ $section->title_en ?? '' }}*
                                            </label>

                                            @if($section->type === 'checkbox')
                                                @foreach($section->specifications as $spec)
                                                    <div class="form-check">
                                                        @php $id = 'spec_'.$spec->id; @endphp
                                                        <input
                                                            type="checkbox"
                                                            id="{{ $id }}"
                                                            name="specifications[]"
                                                            value="{{ $spec->id }}"
                                                            class="form-check-input"
                                                            {{ in_array($spec->id, $selectedSpecs, true) ? 'checked' : '' }}
                                                        >
                                                        <label class="form-check-label" for="{{ $id }}">
                                                            {{ $spec->title_en ?? '' }}
                                                        </label>
                                                    </div>
                                                @endforeach

                                            @elseif($section->type === 'dropdown_plural')
                                                @php
                                                    $sectionSelected = array_values(array_intersect(
                                                        $selectedSpecs,
                                                        $section->specifications->pluck('id')->toArray()
                                                    ));
                                                @endphp

                                                <select
                                                    name="specifications[]"
                                                    class="form-control select2 section-select"
                                                    multiple="multiple"
                                                    data-placeholder="Please select"
                                                >
                                                    @foreach($section->specifications as $spec)
                                                        <option value="{{ $spec->id }}" {{ in_array($spec->id, $sectionSelected, true) ? 'selected' : '' }}>
                                                            {{ $spec->title_en ?? '' }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                            @elseif($section->type === 'dropdown_singular')
                                                @php
                                                    // اختَر أول قيمة من المحدد ضمن مواصفات هذا السيكشن (إن وجدت)
                                                    $firstSelected = collect($section->specifications)->pluck('id')->intersect($selectedSpecs)->first();
                                                @endphp

                                                <select
                                                    name="specifications[]"
                                                    class="form-control select2 section-select"
                                                    data-placeholder="Please select">
                                                    <option value="">Please select</option>
                                                    @foreach($section->specifications as $spec)
                                                        <option value="{{ $spec->id }}" {{ (int)$firstSelected === (int)$spec->id ? 'selected' : '' }}>
                                                            {{ $spec->title_en ?? '' }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>

                                @if($errors->has('specifications'))
                                    <em class="invalid-feedback d-block">
                                        {{ $errors->first('specifications') }}
                                    </em>
                                @endif

                                <p class="helper-block">
                                    {{ trans('cruds.property.fields.specifications_helper') }}
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
                            <div class="form-group {{ $errors->has('outdoor_area') ? 'has-error' : '' }}">
                                <label for="outdoor_area">{{ trans('cruds.property.fields.outdoor_area') }}*</label>
                                <input type="text" id="outdoor_area" name="outdoor_area" class="form-control" value="{{ old('outdoor_area', isset($property) ? $property->outdoor_area : '') }}" required>
                                @if($errors->has('outdoor_area'))
                                    <em class="invalid-feedback">
                                        {{ $errors->first('outdoor_area') }}
                                    </em>
                                @endif
                                <p class="helper-block">
                                    {{ trans('cruds.property.fields.outdoor_area_helper') }}
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
                            <div class="form-group {{ $errors->has('master_bedrooms') ? 'has-error' : '' }}">
                                <label for="master_bedrooms">{{ trans('cruds.property.fields.master_bedrooms') }}*</label>
                                <input type="number" step="1" min="0" id="master_bedrooms" name="master_bedrooms" class="form-control" value="{{ old('master_bedrooms', isset($property) ? $property->master_bedrooms : '') }}" required>
                                @if($errors->has('master_bedrooms'))
                                    <em class="invalid-feedback">
                                        {{ $errors->first('master_bedrooms') }}
                                    </em>
                                @endif
                                <p class="helper-block">
                                    {{ trans('cruds.property.fields.master_bedrooms_helper') }}
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
                            <div class="form-group {{ $errors->has('building_number') ? 'has-error' : '' }}">
                                <label for="building_number">{{ trans('cruds.property.fields.building_number') }}*</label>
                                <input type="text" id="building_number" name="building_number" class="form-control" value="{{ old('building_number', isset($property) ? $property->building_number : '') }}" required>
                                @if($errors->has('building_number'))
                                    <em class="invalid-feedback">
                                        {{ $errors->first('building_number') }}
                                    </em>
                                @endif
                                <p class="helper-block">
                                    {{ trans('cruds.property.fields.building_number_helper') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                {{--                Systems & Comfort--}}
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            Systems & Comfort
                        </div>
                        <div class="card-body">
                            <div class="form-group {{ $errors->has('specifications') ? 'has-error' : '' }}">

                                <div id="specifications-wrapper">
                                    @php
                                        // مصفوفة القيم المحددة مسبقاً
                                        $selectedSpecs = old('specifications', isset($property) ? $property->specifications->pluck('id')->toArray() : []);
                                    @endphp

                                    @foreach($sections->whereIN('id', [1, 7]) as $section)
                                        <div class="mb-3 section-block" data-section-type="{{ $section->type }}">
                                            <label for="specifications">
                                                {{ $section->title_en ?? '' }}*
                                            </label>

                                            @if($section->type === 'checkbox')
                                                @foreach($section->specifications as $spec)
                                                    <div class="form-check">
                                                        @php $id = 'spec_'.$spec->id; @endphp
                                                        <input
                                                            type="checkbox"
                                                            id="{{ $id }}"
                                                            name="specifications[]"
                                                            value="{{ $spec->id }}"
                                                            class="form-check-input"
                                                            {{ in_array($spec->id, $selectedSpecs, true) ? 'checked' : '' }}
                                                        >
                                                        <label class="form-check-label" for="{{ $id }}">
                                                            {{ $spec->title_en ?? '' }}
                                                        </label>
                                                    </div>
                                                @endforeach

                                            @elseif($section->type === 'dropdown_plural')
                                                @php
                                                    $sectionSelected = array_values(array_intersect(
                                                        $selectedSpecs,
                                                        $section->specifications->pluck('id')->toArray()
                                                    ));
                                                @endphp

                                                <select
                                                    name="specifications[]"
                                                    class="form-control select2 section-select"
                                                    multiple="multiple"
                                                    data-placeholder="Please select"
                                                >
                                                    @foreach($section->specifications as $spec)
                                                        <option value="{{ $spec->id }}" {{ in_array($spec->id, $sectionSelected, true) ? 'selected' : '' }}>
                                                            {{ $spec->title_en ?? '' }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                            @elseif($section->type === 'dropdown_singular')
                                                @php
                                                    // اختَر أول قيمة من المحدد ضمن مواصفات هذا السيكشن (إن وجدت)
                                                    $firstSelected = collect($section->specifications)->pluck('id')->intersect($selectedSpecs)->first();
                                                @endphp

                                                <select
                                                    name="specifications[]"
                                                    class="form-control select2 section-select"
                                                    data-placeholder="Please select">
                                                    <option value="">Please select</option>
                                                    @foreach($section->specifications as $spec)
                                                        <option value="{{ $spec->id }}" {{ (int)$firstSelected === (int)$spec->id ? 'selected' : '' }}>
                                                            {{ $spec->title_en ?? '' }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            @endif
                                        </div>
                                        <hr>
                                    @endforeach
                                </div>

                                @if($errors->has('specifications'))
                                    <em class="invalid-feedback d-block">
                                        {{ $errors->first('specifications') }}
                                    </em>
                                @endif

                                <p class="helper-block">
                                    {{ trans('cruds.property.fields.specifications_helper') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                {{--                Outdoor Features--}}
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            Outdoor Features
                        </div>
                        <div class="card-body">
                            <div class="form-group {{ $errors->has('specifications') ? 'has-error' : '' }}">

                                <div id="specifications-wrapper">
                                    @php
                                        // مصفوفة القيم المحددة مسبقاً
                                        $selectedSpecs = old('specifications', isset($property) ? $property->specifications->pluck('id')->toArray() : []);
                                    @endphp

                                    @foreach($sections->whereIN('id', [2]) as $section)
                                        <div class="mb-3 section-block" data-section-type="{{ $section->type }}">
                                            <label for="specifications">
                                                {{ $section->title_en ?? '' }}*
                                            </label>

                                            @if($section->type === 'checkbox')
                                                @foreach($section->specifications as $spec)
                                                    <div class="form-check">
                                                        @php $id = 'spec_'.$spec->id; @endphp
                                                        <input
                                                            type="checkbox"
                                                            id="{{ $id }}"
                                                            name="specifications[]"
                                                            value="{{ $spec->id }}"
                                                            class="form-check-input"
                                                            {{ in_array($spec->id, $selectedSpecs, true) ? 'checked' : '' }}
                                                        >
                                                        <label class="form-check-label" for="{{ $id }}">
                                                            {{ $spec->title_en ?? '' }}
                                                        </label>
                                                    </div>
                                                @endforeach

                                            @elseif($section->type === 'dropdown_plural')
                                                @php
                                                    $sectionSelected = array_values(array_intersect(
                                                        $selectedSpecs,
                                                        $section->specifications->pluck('id')->toArray()
                                                    ));
                                                @endphp

                                                <select
                                                    name="specifications[]"
                                                    class="form-control select2 section-select"
                                                    multiple="multiple"
                                                    data-placeholder="Please select"
                                                >
                                                    @foreach($section->specifications as $spec)
                                                        <option value="{{ $spec->id }}" {{ in_array($spec->id, $sectionSelected, true) ? 'selected' : '' }}>
                                                            {{ $spec->title_en ?? '' }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                            @elseif($section->type === 'dropdown_singular')
                                                @php
                                                    // اختَر أول قيمة من المحدد ضمن مواصفات هذا السيكشن (إن وجدت)
                                                    $firstSelected = collect($section->specifications)->pluck('id')->intersect($selectedSpecs)->first();
                                                @endphp

                                                <select
                                                    name="specifications[]"
                                                    class="form-control select2 section-select"
                                                    data-placeholder="Please select">
                                                    <option value="">Please select</option>
                                                    @foreach($section->specifications as $spec)
                                                        <option value="{{ $spec->id }}" {{ (int)$firstSelected === (int)$spec->id ? 'selected' : '' }}>
                                                            {{ $spec->title_en ?? '' }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            @endif
                                        </div>
                                        <hr>
                                    @endforeach
                                </div>

                                @if($errors->has('specifications'))
                                    <em class="invalid-feedback d-block">
                                        {{ $errors->first('specifications') }}
                                    </em>
                                @endif

                                <p class="helper-block">
                                    {{ trans('cruds.property.fields.specifications_helper') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                {{--                Parking & Building--}}
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            Parking & Building
                        </div>
                        <div class="card-body">
                            <div class="form-group {{ $errors->has('specifications') ? 'has-error' : '' }}">

                                <div id="specifications-wrapper">
                                    @php
                                        // مصفوفة القيم المحددة مسبقاً
                                        $selectedSpecs = old('specifications', isset($property) ? $property->specifications->pluck('id')->toArray() : []);
                                    @endphp

                                    @foreach($sections->whereIN('id', [3]) as $section)
                                        <div class="mb-3 section-block" data-section-type="{{ $section->type }}">
                                            <label for="specifications">
                                                {{ $section->title_en ?? '' }}*
                                            </label>

                                            @if($section->type === 'checkbox')
                                                @foreach($section->specifications as $spec)
                                                    <div class="form-check">
                                                        @php $id = 'spec_'.$spec->id; @endphp
                                                        <input
                                                            type="checkbox"
                                                            id="{{ $id }}"
                                                            name="specifications[]"
                                                            value="{{ $spec->id }}"
                                                            class="form-check-input"
                                                            {{ in_array($spec->id, $selectedSpecs, true) ? 'checked' : '' }}
                                                        >
                                                        <label class="form-check-label" for="{{ $id }}">
                                                            {{ $spec->title_en ?? '' }}
                                                        </label>
                                                    </div>
                                                @endforeach

                                            @elseif($section->type === 'dropdown_plural')
                                                @php
                                                    $sectionSelected = array_values(array_intersect(
                                                        $selectedSpecs,
                                                        $section->specifications->pluck('id')->toArray()
                                                    ));
                                                @endphp

                                                <select
                                                    name="specifications[]"
                                                    class="form-control select2 section-select"
                                                    multiple="multiple"
                                                    data-placeholder="Please select"
                                                >
                                                    @foreach($section->specifications as $spec)
                                                        <option value="{{ $spec->id }}" {{ in_array($spec->id, $sectionSelected, true) ? 'selected' : '' }}>
                                                            {{ $spec->title_en ?? '' }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                            @elseif($section->type === 'dropdown_singular')
                                                @php
                                                    // اختَر أول قيمة من المحدد ضمن مواصفات هذا السيكشن (إن وجدت)
                                                    $firstSelected = collect($section->specifications)->pluck('id')->intersect($selectedSpecs)->first();
                                                @endphp

                                                <select
                                                    name="specifications[]"
                                                    class="form-control select2 section-select"
                                                    data-placeholder="Please select">
                                                    <option value="">Please select</option>
                                                    @foreach($section->specifications as $spec)
                                                        <option value="{{ $spec->id }}" {{ (int)$firstSelected === (int)$spec->id ? 'selected' : '' }}>
                                                            {{ $spec->title_en ?? '' }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            @endif
                                        </div>
                                        <hr>
                                    @endforeach
                                </div>

                                @if($errors->has('specifications'))
                                    <em class="invalid-feedback d-block">
                                        {{ $errors->first('specifications') }}
                                    </em>
                                @endif

                                <p class="helper-block">
                                    {{ trans('cruds.property.fields.specifications_helper') }}
                                </p>
                            </div>
                            <div class="form-group {{ $errors->has('parking_spaces') ? 'has-error' : '' }}">
                                <label for="parking_spaces">{{ trans('cruds.property.fields.parking_spaces') }}*</label>
                                <input type="number" step="1" min="0" id="parking_spaces" name="parking_spaces" class="form-control" value="{{ old('parking_spaces', isset($property) ? $property->parking_spaces : '') }}" required>
                                @if($errors->has('parking_spaces'))
                                    <em class="invalid-feedback">
                                        {{ $errors->first('parking_spaces') }}
                                    </em>
                                @endif
                                <p class="helper-block">
                                    {{ trans('cruds.property.fields.parking_spaces_helper') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                {{--                Financials--}}
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            Financials
                        </div>
                        <div class="card-body">
                            <div class="form-group {{ $errors->has('specifications') ? 'has-error' : '' }}">

                                <div id="specifications-wrapper">
                                    @php
                                        // مصفوفة القيم المحددة مسبقاً
                                        $selectedSpecs = old('specifications', isset($property) ? $property->specifications->pluck('id')->toArray() : []);
                                    @endphp

                                    @foreach($sections->whereIN('id', [4]) as $section)
                                        <div class="mb-3 section-block" data-section-type="{{ $section->type }}">
                                            <label for="specifications">
                                                {{ $section->title_en ?? '' }}*
                                            </label>

                                            @if($section->type === 'checkbox')
                                                @foreach($section->specifications as $spec)
                                                    <div class="form-check">
                                                        @php $id = 'spec_'.$spec->id; @endphp
                                                        <input
                                                            type="checkbox"
                                                            id="{{ $id }}"
                                                            name="specifications[]"
                                                            value="{{ $spec->id }}"
                                                            class="form-check-input"
                                                            {{ in_array($spec->id, $selectedSpecs, true) ? 'checked' : '' }}
                                                        >
                                                        <label class="form-check-label" for="{{ $id }}">
                                                            {{ $spec->title_en ?? '' }}
                                                        </label>
                                                    </div>
                                                @endforeach

                                            @elseif($section->type === 'dropdown_plural')
                                                @php
                                                    $sectionSelected = array_values(array_intersect(
                                                        $selectedSpecs,
                                                        $section->specifications->pluck('id')->toArray()
                                                    ));
                                                @endphp

                                                <select
                                                    name="specifications[]"
                                                    class="form-control select2 section-select"
                                                    multiple="multiple"
                                                    data-placeholder="Please select"
                                                >
                                                    @foreach($section->specifications as $spec)
                                                        <option value="{{ $spec->id }}" {{ in_array($spec->id, $sectionSelected, true) ? 'selected' : '' }}>
                                                            {{ $spec->title_en ?? '' }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                            @elseif($section->type === 'dropdown_singular')
                                                @php
                                                    // اختَر أول قيمة من المحدد ضمن مواصفات هذا السيكشن (إن وجدت)
                                                    $firstSelected = collect($section->specifications)->pluck('id')->intersect($selectedSpecs)->first();
                                                @endphp

                                                <select
                                                    name="specifications[]"
                                                    class="form-control select2 section-select"
                                                    data-placeholder="Please select">
                                                    <option value="">Please select</option>
                                                    @foreach($section->specifications as $spec)
                                                        <option value="{{ $spec->id }}" {{ (int)$firstSelected === (int)$spec->id ? 'selected' : '' }}>
                                                            {{ $spec->title_en ?? '' }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            @endif
                                        </div>
                                        <hr>
                                    @endforeach
                                </div>

                                @if($errors->has('specifications'))
                                    <em class="invalid-feedback d-block">
                                        {{ $errors->first('specifications') }}
                                    </em>
                                @endif

                                <p class="helper-block">
                                    {{ trans('cruds.property.fields.specifications_helper') }}
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
                                    <option value="annual" {{ old('price_per', isset($property) && $property->price_per == 'annual' ? 'selected' : '') }}>Annual</option>
                                    <option value="monthly" {{ old('price_per', isset($property) && $property->price_per == 'monthly' ? 'selected' : '') }}>Monthly</option>
                                    <option value="negotiable" {{ old('price_per', isset($property) && $property->price_per == 'negotiable' ? 'selected' : '') }}>Negotiable</option>
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
                            <div class="form-group {{ $errors->has('deposit') ? 'has-error' : '' }}">
                                <label for="deposit">{{ trans('cruds.property.fields.deposit') }}*</label>
                                <input type="number" step="1" min="0" id="deposit" name="deposit" class="form-control" value="{{ old('deposit', isset($property) ? $property->deposit : '') }}" required>
                                @if($errors->has('deposit'))
                                    <em class="invalid-feedback">
                                        {{ $errors->first('deposit') }}
                                    </em>
                                @endif
                                <p class="helper-block">
                                    {{ trans('cruds.property.fields.deposit_helper') }}
                                </p>
                            </div>
                            <div class="form-group {{ $errors->has('maintenance_fee') ? 'has-error' : '' }}">
                                <label for="maintenance_fee">{{ trans('cruds.property.fields.maintenance_fee') }}*</label>
                                <input type="number" step="0.001" min="0" id="maintenance_fee" name="maintenance_fee" class="form-control" value="{{ old('maintenance_fee', isset($property) ? $property->maintenance_fee : '0') }}" required>
                                @if($errors->has('maintenance_fee'))
                                    <em class="invalid-feedback">
                                        {{ $errors->first('maintenance_fee') }}
                                    </em>
                                @endif
                                <p class="helper-block">
                                    {{ trans('cruds.property.fields.maintenance_fee_helper') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                {{--                Landlord/Contact--}}
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            Landlord/Contact
                        </div>
                        <div class="card-body">
                            <div class="form-group {{ $errors->has('landlord_name') ? 'has-error' : '' }}">
                                <label for="landlord_name">{{ trans('cruds.property.fields.landlord_name') }}*</label>
                                <input type="text" id="landlord_name" name="landlord_name" class="form-control" value="{{ old('landlord_name', isset($property) ? $property->landlord_name : '') }}" required>
                                @if($errors->has('landlord_name'))
                                    <em class="invalid-feedback">
                                        {{ $errors->first('landlord_name') }}
                                    </em>
                                @endif
                                <p class="helper-block">
                                    {{ trans('cruds.property.fields.landlord_name_helper') }}
                                </p>
                            </div>
                            <div class="form-group {{ $errors->has('landlord_phone') ? 'has-error' : '' }}">
                                <label for="landlord_phone">{{ trans('cruds.property.fields.landlord_phone') }}*</label>
                                <input type="tel" id="landlord_phone" name="landlord_phone" class="form-control" value="{{ old('landlord_phone', isset($property) ? $property->landlord_phone : '') }}" required>
                                @if($errors->has('landlord_phone'))
                                    <em class="invalid-feedback">
                                        {{ $errors->first('landlord_phone') }}
                                    </em>
                                @endif
                                <p class="helper-block">
                                    {{ trans('cruds.property.fields.landlord_phone_helper') }}
                                </p>
                            </div>
                            <div class="form-group {{ $errors->has('guard_name') ? 'has-error' : '' }}">
                                <label for="guard_name">{{ trans('cruds.property.fields.guard_name') }}*</label>
                                <input type="text" id="guard_name" name="guard_name" class="form-control" value="{{ old('guard_name', isset($property) ? $property->guard_name : '') }}" required>
                                @if($errors->has('guard_name'))
                                    <em class="invalid-feedback">
                                        {{ $errors->first('guard_name') }}
                                    </em>
                                @endif
                                <p class="helper-block">
                                    {{ trans('cruds.property.fields.guard_name_helper') }}
                                </p>
                            </div>
                            <div class="form-group {{ $errors->has('guard_phone') ? 'has-error' : '' }}">
                                <label for="guard_phone">{{ trans('cruds.property.fields.guard_phone') }}*</label>
                                <input type="tel" id="guard_phone" name="guard_phone" class="form-control" value="{{ old('guard_phone', isset($property) ? $property->guard_phone : '') }}" required>
                                @if($errors->has('guard_phone'))
                                    <em class="invalid-feedback">
                                        {{ $errors->first('guard_phone') }}
                                    </em>
                                @endif
                                <p class="helper-block">
                                    {{ trans('cruds.property.fields.guard_phone_helper') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                {{--                Media--}}
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            Media
                        </div>
                        <div class="card-body">
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
                            <div class="form-group {{ $errors->has('video') ? 'has-error' : '' }}">
                                <label for="video">{{ trans('cruds.property.fields.video') }}</label>
                                <textarea id="video" name="video" class="form-control summernote">{{ old('video', isset($property) ? $property->video : '') }}</textarea>
                                @if($errors->has('video'))
                                    <em class="invalid-feedback">
                                        {{ $errors->first('video') }}
                                    </em>
                                @endif
                                <p class="helper-block">
                                    {{ trans('cruds.property.fields.video_helper') }}
                                </p>
                            </div>
                            <div class="form-group {{ $errors->has('virtual360') ? 'has-error' : '' }}">
                                <label for="virtual360">{{ trans('cruds.property.fields.virtual360') }}</label>
                                <textarea id="virtual360" name="virtual360" class="form-control summernote">{{ old('virtual360', isset($property) ? $property->virtual360 : '') }}</textarea>
                                @if($errors->has('virtual360'))
                                    <em class="invalid-feedback">
                                        {{ $errors->first('virtual360') }}
                                    </em>
                                @endif
                                <p class="helper-block">
                                    {{ trans('cruds.property.fields.virtual360_helper') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                {{--                Extra Info--}}
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            Extra Info
                        </div>
                        <div class="card-body">
                            <div class="form-group {{ $errors->has('specifications') ? 'has-error' : '' }}">

                                <div id="specifications-wrapper">
                                    @php
                                        // مصفوفة القيم المحددة مسبقاً
                                        $selectedSpecs = old('specifications', isset($property) ? $property->specifications->pluck('id')->toArray() : []);
                                    @endphp

                                    @foreach($sections->where('id', '>', 13) as $section)
                                        <div class="mb-3 section-block" data-section-type="{{ $section->type }}">
                                            <label for="specifications">
                                                {{ $section->title_en ?? '' }}*
                                            </label>

                                            @if($section->type === 'checkbox')
                                                @foreach($section->specifications as $spec)
                                                    <div class="form-check">
                                                        @php $id = 'spec_'.$spec->id; @endphp
                                                        <input
                                                            type="checkbox"
                                                            id="{{ $id }}"
                                                            name="specifications[]"
                                                            value="{{ $spec->id }}"
                                                            class="form-check-input"
                                                            {{ in_array($spec->id, $selectedSpecs, true) ? 'checked' : '' }}
                                                        >
                                                        <label class="form-check-label" for="{{ $id }}">
                                                            {{ $spec->title_en ?? '' }}
                                                        </label>
                                                    </div>
                                                @endforeach

                                            @elseif($section->type === 'dropdown_plural')
                                                @php
                                                    $sectionSelected = array_values(array_intersect(
                                                        $selectedSpecs,
                                                        $section->specifications->pluck('id')->toArray()
                                                    ));
                                                @endphp

                                                <select
                                                    name="specifications[]"
                                                    class="form-control select2 section-select"
                                                    multiple="multiple"
                                                    data-placeholder="Please select"
                                                >
                                                    @foreach($section->specifications as $spec)
                                                        <option value="{{ $spec->id }}" {{ in_array($spec->id, $sectionSelected, true) ? 'selected' : '' }}>
                                                            {{ $spec->title_en ?? '' }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                            @elseif($section->type === 'dropdown_singular')
                                                @php
                                                    // اختَر أول قيمة من المحدد ضمن مواصفات هذا السيكشن (إن وجدت)
                                                    $firstSelected = collect($section->specifications)->pluck('id')->intersect($selectedSpecs)->first();
                                                @endphp

                                                <select
                                                    name="specifications[]"
                                                    class="form-control select2 section-select"
                                                    data-placeholder="Please select">
                                                    <option value="">Please select</option>
                                                    @foreach($section->specifications as $spec)
                                                        <option value="{{ $spec->id }}" {{ (int)$firstSelected === (int)$spec->id ? 'selected' : '' }}>
                                                            {{ $spec->title_en ?? '' }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            @endif
                                        </div>
                                        <hr>
                                    @endforeach
                                </div>

                                @if($errors->has('specifications'))
                                    <em class="invalid-feedback d-block">
                                        {{ $errors->first('specifications') }}
                                    </em>
                                @endif

                                <p class="helper-block">
                                    {{ trans('cruds.property.fields.specifications_helper') }}
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
                            <div class="form-group {{ $errors->has('tags') ? 'has-error' : '' }}">
                                <label for="tags">{{ trans('cruds.property.fields.tags') }}*</label>
                                <textarea id="tags" name="tags" class="form-control" required>{{ old('tags', isset($property) ? $property->tags : '') }}</textarea>
                                @if($errors->has('tags'))
                                    <em class="invalid-feedback">
                                        {{ $errors->first('tags') }}
                                    </em>
                                @endif
                                <p class="helper-block">
                                    {{ trans('cruds.property.fields.tags_helper') }}
                                </p>
                            </div>
                            <div class="form-group {{ $errors->has('availability_date') ? 'has-error' : '' }}">
                                <label for="availability_date">{{ trans('cruds.property.fields.availability_date') }}*</label>
                                <input type="date" id="availability_date" name="availability_date" class="form-control" value="{{ old('availability_date', isset($property) ? $property->availability_date : '') }}" required>
                                @if($errors->has('availability_date'))
                                    <em class="invalid-feedback">
                                        {{ $errors->first('availability_date') }}
                                    </em>
                                @endif
                                <p class="helper-block">
                                    {{ trans('cruds.property.fields.availability_date_helper') }}
                                </p>
                            </div>
                            <div class="form-group {{ $errors->has('notes') ? 'has-error' : '' }}">
                                <label for="notes">{{ trans('cruds.property.fields.notes') }}*</label>
                                <textarea id="notes" name="notes" class="form-control">{{ old('notes', isset($property) ? $property->notes : '') }}</textarea>
                                @if($errors->has('notes'))
                                    <em class="invalid-feedback">
                                        {{ $errors->first('notes') }}
                                    </em>
                                @endif
                                <p class="helper-block">
                                    {{ trans('cruds.property.fields.notes_helper') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
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
        (function() {
            // تفعيل select2 إذا كان موجود
            if (window.jQuery && $.fn.select2) {
                $('.select2').select2({ width: '100%' });
            }

            // Select all / Deselect all داخل نفس الـ wrapper
            const wrapper = document.getElementById('specifications-wrapper');

            document.querySelector('.select-all')?.addEventListener('click', function(e) {
                e.preventDefault();

                // شيّكبوكس
                wrapper.querySelectorAll('input[type="checkbox"]').forEach(cb => { cb.checked = true; });

                // سيلكت متعددة
                wrapper.querySelectorAll('select[multiple]').forEach(sel => {
                    Array.from(sel.options).forEach(op => op.selected = true);
                    if ($(sel).data('select2')) $(sel).trigger('change.select2');
                });
            });

            document.querySelector('.deselect-all')?.addEventListener('click', function(e) {
                e.preventDefault();

                // شيّكبوكس
                wrapper.querySelectorAll('input[type="checkbox"]').forEach(cb => { cb.checked = false; });

                // سيلكت متعددة و مفردة
                wrapper.querySelectorAll('select').forEach(sel => {
                    Array.from(sel.options).forEach(op => op.selected = false);
                    if ($(sel).data('select2')) $(sel).val(null).trigger('change.select2');
                });
            });
        })();
    </script>

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
                    {!! json_arcode($property->photos) !!}
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

