<?php

namespace App\Http\Controllers;

use App\Models\Observation;
use Illuminate\Http\Request;

class ObservationController extends Controller
{
    public function index()
    {
        return Observation::all();
    }
    public function show(Observation $observation)
    {
        return $observation;
    }
    public function store(Request $request)
    {
        $observation = Observation::create($request->all());
        return response()->json($observation,201);
    }
    public function update(Request $request, Observation $observation)
    {
        $observation->update($request->all());
        return response()->json($observation, 200);

    }
    public function delete(Observation $observation)
    {
        $observation->delete();
        return response()->json(null, 204);
    }
}
