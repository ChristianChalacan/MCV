<?php

namespace App\Http\Controllers;

use App\Models\Charge;
use Illuminate\Http\Request;
use App\Http\Resources\Charge as ChargeResource;
use App\Http\Resources\ChargeCollection;

class ChargeController extends Controller
{
    public function index()
    {
        return new ChargeCollection(Charge::paginate(10));
    }
    public function show(Charge $charge)
    {
        return response()->json(new ChargeResource($charge),200);
    }
    public function store(Request $request)
    {
        $charge = new Charge($request->all());
        $charge->save();
        return response()->json(new ChargeResource($charge),201);
    }
    public function update(Request $request, Charge $charge)
    {
        $charge->update($request->all());
        return response()->json(new ChargeResource($charge),200);

    }
    public function delete(Charge $charge)
    {
        $charge->delete();
        return response()->json(null, 204);
    }
}
