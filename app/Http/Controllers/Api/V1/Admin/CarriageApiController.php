<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCarriageRequest;
use App\Http\Requests\UpdateCarriageRequest;
use App\Http\Resources\Admin\CarriageResource;
use App\Models\Carriage;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CarriageApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('carriage_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CarriageResource(Carriage::with(['train'])->get());
    }

    public function store(StoreCarriageRequest $request)
    {
        $carriage = Carriage::create($request->all());

        return (new CarriageResource($carriage))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Carriage $carriage)
    {
        abort_if(Gate::denies('carriage_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CarriageResource($carriage->load(['train']));
    }

    public function update(UpdateCarriageRequest $request, Carriage $carriage)
    {
        $carriage->update($request->all());

        return (new CarriageResource($carriage))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Carriage $carriage)
    {
        abort_if(Gate::denies('carriage_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $carriage->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
