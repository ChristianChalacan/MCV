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
        return new WasteCollection(Waste::paginate(10));
    }
    public function show(Waste $waste)
    {
        return response()->json(new WasteResource($waste),200);
    }
    public function store(Request $request)
    {
        $waste = new Waste($request->all());
        $waste->save();
        return response()->json(new WasteResource($waste),201);
    }
    public function update(Request $request, Waste $waste)
    {
        $waste->update($request->all());
        return response()->json(new WasteResource($waste),200);

    }
    public function delete(Waste $waste)
    {
        $waste->delete();
        return response()->json(null, 204);
    }
}
