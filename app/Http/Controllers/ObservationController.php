<?php

namespace App\Http\Controllers;

use App\Models\Observation;
use Illuminate\Http\Request;
use App\Http\Resources\Observation as ObservationResource;
use App\Http\Resources\ObservationCollection;

class ObservationController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Observation::class);
        return new ObservationCollection(Observation::paginate(10));
    }
    public function show(Observation $observation)
    {
        $this->authorize('view', $observation);
        return response()->json(new ObservationResource($observation),200);
    }
    public function store(Request $request)
    {
        $this->authorize('create', Observation::class);
        $observation = new Observation($request->all());
        $observation->save();
        return response()->json(new ObservationResource($observation),201);
    }
    public function update(Request $request, Observation $observation)
    {
        $this->authorize('update', $observation);
        $observation->update($request->all());
        return response()->json(new ObservationResource($observation),200);

    }
    public function delete(Observation $observation)
    {
        $this->authorize('delete', $observation);
        $observation->delete();
        return response()->json(null, 204);
    }
}
