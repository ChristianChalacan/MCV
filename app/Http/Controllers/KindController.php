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
        $this->authorize('viewAny', Kind::class);
        return new KindCollection(Kind::paginate(10));
    }
    public function show(Kind $kind)
    {
        $this->authorize('view', $kind);
        return response()->json(new KindResource($kind),200);
    }
    public function store(Request $request)
    {
        $this->authorize('create', Kind::class);
        $kind = new Kind($request->all());
        $kind->save();
        return response()->json(new KindResource($kind),201);
    }
    public function update(Request $request, Kind $kind)
    {
        $this->authorize('update', $kind);
        $kind->update($request->all());
        return response()->json(new KindResource($kind),200);

    }
    public function delete(Kind $kind)
    {
        $this->authorize('delete', $kind);
        $kind->delete();
        return response()->json(null, 204);
    }
}
