<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTrainTypeRequest;
use App\Http\Requests\UpdateTrainTypeRequest;
use App\Http\Resources\Admin\TrainTypeResource;
use App\Models\TrainType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrainTypeApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('train_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TrainTypeResource(TrainType::all());
    }

    public function store(StoreTrainTypeRequest $request)
    {
        $trainType = TrainType::create($request->all());

        return (new TrainTypeResource($trainType))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(TrainType $trainType)
    {
        abort_if(Gate::denies('train_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TrainTypeResource($trainType);
    }

    public function update(UpdateTrainTypeRequest $request, TrainType $trainType)
    {
        $trainType->update($request->all());

        return (new TrainTypeResource($trainType))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(TrainType $trainType)
    {
        abort_if(Gate::denies('train_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $trainType->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
