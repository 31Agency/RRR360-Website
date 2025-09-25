@extends('layouts.customize-admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.owner.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.owners.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.owner.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($owner) ? $owner->name : '') }}" required>
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.owner.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">{{ trans('cruds.owner.fields.email') }}*</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email', isset($owner) ? $owner->email : '') }}" required>
                @if($errors->has('email'))
                    <em class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.owner.fields.email_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('whatsapp') ? 'has-error' : '' }}">
                <label for="whatsapp">{{ trans('cruds.owner.fields.whatsapp') }}*</label>
                <input type="tel" id="whatsapp" name="whatsapp" class="form-control" value="{{ old('whatsapp', isset($owner) ? $owner->whatsapp : '') }}" required>
                @if($errors->has('whatsapp'))
                    <em class="invalid-feedback">
                        {{ $errors->first('whatsapp') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.owner.fields.whatsapp_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('mobile') ? 'has-error' : '' }}">
                <label for="mobile">{{ trans('cruds.owner.fields.mobile') }}*</label>
                <input type="tel" id="mobile" name="mobile" class="form-control" value="{{ old('mobile', isset($owner) ? $owner->mobile : '') }}" required>
                @if($errors->has('mobile'))
                    <em class="invalid-feedback">
                        {{ $errors->first('mobile') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.owner.fields.mobile_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                <label for="phone">{{ trans('cruds.owner.fields.phone') }}*</label>
                <input type="tel" id="phone" name="phone" class="form-control" value="{{ old('phone', isset($owner) ? $owner->phone : '') }}" required>
                @if($errors->has('phone'))
                    <em class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.owner.fields.phone_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection
