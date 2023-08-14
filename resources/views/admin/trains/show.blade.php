@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.train.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.trains.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.train.fields.id') }}
                        </th>
                        <td>
                            {{ $train->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.train.fields.name') }}
                        </th>
                        <td>
                            {{ $train->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.train.fields.train_type') }}
                        </th>
                        <td>
                            {{ $train->train_type->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.trains.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection