<?php

namespace App\Http\Controllers;

use App\Models\Dispatch;
use Illuminate\Http\Request;
use App\Http\Resources\Dispatch as DispatchResource;
use App\Http\Resources\DispatchCollection;

class DispatchController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Dispatch::class);
        return new DispatchCollection(Dispatch::paginate(10));
    }
    public function show(Dispatch $dispatch)
    {
        $this->authorize('view', $dispatch);
        return response()->json(new DispatchResource($dispatch),200);
    }
    public function store(Request $request)
    {
        $this->authorize('create', Dispatch::class);
        $dispatch = new Dispatch($request->all());
        $dispatch->save();
        return response()->json(new DispatchResource($dispatch),201);
    }
    public function update(Request $request, Dispatch $dispatch)
    {
        $this->authorize('update', $dispatch);
        $dispatch->update($request->all());
        return response()->json(new DispatchResource($dispatch),200);

    }
    public function delete(Dispatch $dispatch)
    {
        $this->authorize('delete', $dispatch);
        $dispatch->delete();
        return response()->json(null, 204);
    }
}
