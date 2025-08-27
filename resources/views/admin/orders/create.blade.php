@extends('layouts.customize-admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.order.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.orders.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('vehicle_type_id') ? 'has-error' : '' }}">
                <label for="vehicle_type_id">{{ trans('cruds.order.fields.vehicle_type_id') }}*</label>
                <select id="vehicle_type_id" name="vehicle_type_id" class="form-control" required>
                    @foreach($vehicle_types as $id => $vehicle_type)
                        <option value="{{ $id }}" {{ (old('vehicle_type_id') && old('vehicle_type_id') == $id) || (isset($order) && $order->vehicle_type_id == $id) ? 'selected' : '' }}>{{ $vehicle_type }}</option>
                    @endforeach
                </select>
                @if($errors->has('vehicle_type_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('vehicle_type_id') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.order.fields.vehicle_type_id_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('full_name') ? 'has-error' : '' }}">
                <label for="full_name">{{ trans('cruds.order.fields.full_name') }}*</label>
                <input type="text" id="full_name" name="full_name" class="form-control" value="{{ old('full_name', isset($order) ? $order->full_name : '') }}" required>
                @if($errors->has('full_name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('full_name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.order.fields.full_name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                <label for="phone">{{ trans('cruds.order.fields.phone') }}*</label>
                <input type="tel" id="phone" name="phone" class="form-control" value="{{ old('phone', isset($order) ? $order->phone : '') }}" required>
                @if($errors->has('phone'))
                    <em class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.order.fields.phone_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">{{ trans('cruds.order.fields.email') }}*</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email', isset($order) ? $order->email : '') }}" required>
                @if($errors->has('email'))
                    <em class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.order.fields.email_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('pickup_location') ? 'has-error' : '' }}">
                <label for="pickup_location">{{ trans('cruds.order.fields.pickup_location') }}*</label>
                <input type="text" id="pickup_location" name="pickup_location" class="form-control" value="{{ old('pickup_location', isset($order) ? $order->pickup_location : '') }}" required>
                @if($errors->has('pickup_location'))
                    <em class="invalid-feedback">
                        {{ $errors->first('pickup_location') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.order.fields.pickup_location_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('delivery_location') ? 'has-error' : '' }}">
                <label for="delivery_location">{{ trans('cruds.order.fields.delivery_location') }}*</label>
                <input type="text" id="delivery_location" name="delivery_location" class="form-control" value="{{ old('delivery_location', isset($order) ? $order->delivery_location : '') }}" required>
                @if($errors->has('delivery_location'))
                    <em class="invalid-feedback">
                        {{ $errors->first('delivery_location') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.order.fields.delivery_location_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('preferred_pickup_date') ? 'has-error' : '' }}">
                <label for="preferred_pickup_date">{{ trans('cruds.order.fields.preferred_pickup_date') }}*</label>
                <input type="date" id="preferred_pickup_date" name="preferred_pickup_date" class="form-control" value="{{ old('preferred_pickup_date', isset($order) ? $order->preferred_pickup_date : '') }}" required>
                @if($errors->has('preferred_pickup_date'))
                    <em class="invalid-feedback">
                        {{ $errors->first('preferred_pickup_date') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.order.fields.preferred_pickup_date_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('notes') ? 'has-error' : '' }}">
                <label for="notes">{{ trans('cruds.order.fields.notes') }}</label>
                <textarea id="notes" name="notes" class="form-control">{{ old('notes', isset($order) ? $order->notes : '') }}</textarea>
                @if($errors->has('notes'))
                    <em class="invalid-feedback">
                        {{ $errors->first('notes') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.order.fields.notes_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection
