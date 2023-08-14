@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.carriage.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.carriages.update", [$carriage->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="train_id">{{ trans('cruds.carriage.fields.train') }}</label>
                <select class="form-control select2 {{ $errors->has('train') ? 'is-invalid' : '' }}" name="train_id" id="train_id" required>
                    @foreach($trains as $id => $entry)
                        <option value="{{ $id }}" {{ (old('train_id') ? old('train_id') : $carriage->train->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('train'))
                    <span class="text-danger">{{ $errors->first('train') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.carriage.fields.train_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.carriage.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $carriage->name) }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.carriage.fields.name_helper') }}</span>
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