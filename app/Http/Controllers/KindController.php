<?php

namespace App\Http\Controllers;

use App\Models\Kind;
use Illuminate\Http\Request;
use App\Http\Resources\Kind as KindResource;
use App\Http\Resources\KindCollection;

class KindController extends Controller
{
    public function index()
    {
        return new KindCollection(Kind::paginate(10));
    }
    public function show(Kind $kind)
    {
        return response()->json(new KindResource($kind),200);
    }
    public function store(Request $request)
    {
        $kind = new Kind($request->all());
        $kind->save();
        return response()->json(new KindResource($kind),201);
    }
    public function update(Request $request, Kind $kind)
    {
        $kind->update($request->all());
        return response()->json(new KindResource($kind),200);

    }
    public function delete(Kind $kind)
    {
        $kind->delete();
        return response()->json(null, 204);
    }
}
