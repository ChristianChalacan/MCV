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
        return new ObservationCollection(Observation::paginate(10));
    }
    public function show(Observation $observation)
    {
        return response()->json(new ObservationResource($observation),200);
    }
    public function store(Request $request)
    {
        $observation = new Observation($request->all());
        $observation->save();
        return response()->json(new ObservationResource($observation),201);
    }
    public function update(Request $request, Observation $observation)
    {
        $observation->update($request->all());
        return response()->json(new ObservationResource($observation),200);

    }
    public function delete(Observation $observation)
    {
        $observation->delete();
        return response()->json(null, 204);
    }
}
