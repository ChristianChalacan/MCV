<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Resources\Order as OrderResource;
use App\Http\Resources\OrderCollection;

class OrderController extends Controller
{
    public function index()
    {
        return new OrderCollection(Order::paginate(10));
    }
    public function show(Order $order)
    {
        return response()->json(new OrderResource($order),200);
    }
    public function store(Request $request)
    {
        $order = new Order($request->all());
        $order->save();
        return response()->json(new OrderResource($order),201);
    }
    public function update(Request $request, Order $order)
    {
        $order->update($request->all());
        return response()->json(new OrderResource($order),200);

    }
    public function delete(Order $order)
    {
        $order->delete();
        return response()->json(null, 204);
    }
}
