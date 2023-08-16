<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Resources\Admin\OrderResource;
use App\Models\Order;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OrderApiController extends Controller
{
    public function index(Request $request)
    {
        //abort_if(Gate::denies('order_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OrderResource(Order::with(['user', 'carriage'])->get());
    }

    public function myOrders(Request $request)
    {
        return Order::where('user_id', $request->user()->id)->get();
    }

    public function store(StoreOrderRequest $request)
    {
        $order = Order::create($request->all());

        return (new OrderResource($order))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Order $order)
    {
        //abort_if(Gate::denies('order_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OrderResource($order->load(['user', 'carriage']));
    }

    public function update(UpdateOrderRequest $request, Order $order)
    {
        $order->update($request->all());

        return (new OrderResource($order))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Order $order)
    {
        abort_if(Gate::denies('order_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $order->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function confirmReceived($order_id)
    {
        $order = Order::find($order_id);
        $order->received = true;
        $order->save();

        return $order;
    }
}