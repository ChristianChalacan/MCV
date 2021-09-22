<?php

namespace App\Http\Controllers;

use App\Models\Shipping;
use Illuminate\Http\Request;
use App\Http\Resources\Shipping as ShippingResource;
use App\Http\Resources\ShippingCollection;

class ShippingController extends Controller
{
    public function index()
    {
        return new ShippingCollection(Shipping::paginate(10));

    }
    public function show(Shipping $shipping)
    {
        return response()->json(new ShippingResource($shipping),200);
    }
    public function store(Request $request)
    {
        $shipping = new Shipping($request->all());
        $shipping->save();
        return response()->json(new ShippingResource($shipping),201);
    }
    public function update(Request $request, Shipping $shipping)
    {
        $shipping->update($request->all());
        return response()->json(new ShippingResource($shipping),200);

    }
    public function delete(Shipping $shipping)
    {
        $shipping->delete();
        return response()->json(null, 204);
    }
}
