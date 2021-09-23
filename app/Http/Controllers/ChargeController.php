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
        $this->authorize('viewAny', Charge::class);
        return new ChargeCollection(Charge::paginate(10));
    }
    public function show(Charge $charge)
    {
        $this->authorize('view', $charge);
        return response()->json(new ChargeResource($charge),200);
    }
    public function store(Request $request)
    {
        $this->authorize('create', Charge::class);
        $charge = new Charge($request->all());
        $charge->save();
        return response()->json(new ChargeResource($charge),201);
    }
    public function update(Request $request, Charge $charge)
    {
        $this->authorize('update', $charge);
        $charge->update($request->all());
        return response()->json(new ChargeResource($charge),200);

    }
    public function delete(Charge $charge)
    {
        $this->authorize('delete', $charge);
        $charge->delete();
        return response()->json(null, 204);
    }
}
