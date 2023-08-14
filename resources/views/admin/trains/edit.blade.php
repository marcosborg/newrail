@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.train.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.trains.update", [$train->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.train.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $train->name) }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.train.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="train_type_id">{{ trans('cruds.train.fields.train_type') }}</label>
                <select class="form-control select2 {{ $errors->has('train_type') ? 'is-invalid' : '' }}" name="train_type_id" id="train_type_id" required>
                    @foreach($train_types as $id => $entry)
                        <option value="{{ $id }}" {{ (old('train_type_id') ? old('train_type_id') : $train->train_type->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('train_type'))
                    <span class="text-danger">{{ $errors->first('train_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.train.fields.train_type_helper') }}</span>
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