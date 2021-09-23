<?php

namespace App\Http\Controllers;

use App\Models\Waste;
use Illuminate\Http\Request;
use App\Http\Resources\Waste as WasteResource;
use App\Http\Resources\WasteCollection;

class WasteController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Waste::class);
        return new WasteCollection(Waste::paginate(10));
    }
    public function show(Waste $waste)
    {
        $this->authorize('view', $waste);
        return response()->json(new WasteResource($waste),200);
    }
    public function store(Request $request)
    {
        $this->authorize('create', Waste::class);
        $waste = new Waste($request->all());
        $waste->save();
        return response()->json(new WasteResource($waste),201);
    }
    public function update(Request $request, Waste $waste)
    {
        $this->authorize('update', $waste);
        $waste->update($request->all());
        return response()->json(new WasteResource($waste),200);

    }
    public function delete(Waste $waste)
    {
        $this->authorize('delete', $waste);
        $waste->delete();
        return response()->json(null, 204);
    }
}
