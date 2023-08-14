<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTrainRequest;
use App\Http\Requests\UpdateTrainRequest;
use App\Http\Resources\Admin\TrainResource;
use App\Models\Train;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrainApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('train_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TrainResource(Train::with(['train_type'])->get());
    }

    public function store(StoreTrainRequest $request)
    {
        $train = Train::create($request->all());

        return (new TrainResource($train))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Train $train)
    {
        abort_if(Gate::denies('train_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TrainResource($train->load(['train_type']));
    }

    public function update(UpdateTrainRequest $request, Train $train)
    {
        $train->update($request->all());

        return (new TrainResource($train))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Train $train)
    {
        abort_if(Gate::denies('train_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $train->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
