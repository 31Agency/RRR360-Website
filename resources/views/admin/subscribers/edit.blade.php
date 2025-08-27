@extends('layouts.customize-admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.subscriber.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.subscribers.update", [$subscriber->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.subscriber.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($subscriber) ? $subscriber->name : '') }}" required>
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.subscriber.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">{{ trans('cruds.subscriber.fields.email') }}*</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email', isset($subscriber) ? $subscriber->email : '') }}" required>
                @if($errors->has('email'))
                    <em class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.subscriber.fields.email_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                <label for="phone">{{ trans('cruds.subscriber.fields.phone') }}*</label>
                <input type="tel" id="phone" name="phone" class="form-control" value="{{ old('phone', isset($subscriber) ? $subscriber->phone : '') }}" required>
                @if($errors->has('phone'))
                    <em class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.subscriber.fields.phone_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('message') ? 'has-error' : '' }}">
                <label for="message">{{ trans('cruds.subscriber.fields.message') }}*</label>
                <textarea id="message" name="message" class="form-control" required>{{ old('message', isset($subscriber) ? $subscriber->message : '') }}</textarea>
                @if($errors->has('message'))
                    <em class="invalid-feedback">
                        {{ $errors->first('message') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.subscriber.fields.message_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection
