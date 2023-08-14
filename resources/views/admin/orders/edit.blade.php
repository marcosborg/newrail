@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.order.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.orders.update", [$order->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.order.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $order->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <span class="text-danger">{{ $errors->first('user') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="carriage_id">{{ trans('cruds.order.fields.carriage') }}</label>
                <select class="form-control select2 {{ $errors->has('carriage') ? 'is-invalid' : '' }}" name="carriage_id" id="carriage_id" required>
                    @foreach($carriages as $id => $entry)
                        <option value="{{ $id }}" {{ (old('carriage_id') ? old('carriage_id') : $order->carriage->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('carriage'))
                    <span class="text-danger">{{ $errors->first('carriage') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.carriage_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="seat">{{ trans('cruds.order.fields.seat') }}</label>
                <input class="form-control {{ $errors->has('seat') ? 'is-invalid' : '' }}" type="number" name="seat" id="seat" value="{{ old('seat', $order->seat) }}" step="1" required>
                @if($errors->has('seat'))
                    <span class="text-danger">{{ $errors->first('seat') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.seat_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="cart">{{ trans('cruds.order.fields.cart') }}</label>
                <textarea class="form-control {{ $errors->has('cart') ? 'is-invalid' : '' }}" name="cart" id="cart" required>{{ old('cart', $order->cart) }}</textarea>
                @if($errors->has('cart'))
                    <span class="text-danger">{{ $errors->first('cart') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.cart_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="total">{{ trans('cruds.order.fields.total') }}</label>
                <input class="form-control {{ $errors->has('total') ? 'is-invalid' : '' }}" type="number" name="total" id="total" value="{{ old('total', $order->total) }}" step="0.01" required>
                @if($errors->has('total'))
                    <span class="text-danger">{{ $errors->first('total') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.total_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('received') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="received" value="0">
                    <input class="form-check-input" type="checkbox" name="received" id="received" value="1" {{ $order->received || old('received', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="received">{{ trans('cruds.order.fields.received') }}</label>
                </div>
                @if($errors->has('received'))
                    <span class="text-danger">{{ $errors->first('received') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.received_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('preparing') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="preparing" value="0">
                    <input class="form-check-input" type="checkbox" name="preparing" id="preparing" value="1" {{ $order->preparing || old('preparing', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="preparing">{{ trans('cruds.order.fields.preparing') }}</label>
                </div>
                @if($errors->has('preparing'))
                    <span class="text-danger">{{ $errors->first('preparing') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.preparing_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('delivered') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="delivered" value="0">
                    <input class="form-check-input" type="checkbox" name="delivered" id="delivered" value="1" {{ $order->delivered || old('delivered', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="delivered">{{ trans('cruds.order.fields.delivered') }}</label>
                </div>
                @if($errors->has('delivered'))
                    <span class="text-danger">{{ $errors->first('delivered') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.delivered_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection