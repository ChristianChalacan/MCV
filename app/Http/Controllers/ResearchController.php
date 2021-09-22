<?php

namespace App\Http\Controllers;

use App\Models\Research;
use Illuminate\Http\Request;
use App\Http\Resources\Research as ResearchResource;
use App\Http\Resources\ResearchCollection;

class ResearchController extends Controller
{
    public function index()
    {
        return new ResearchCollection(Research::paginate(10));
    }
    public function show(Research $research)
    {
        return response()->json(new ResearchResource($research),200);
    }
    public function store(Request $request)
    {
        $research = new Research($request->all());
        $research->save();
        return response()->json(new ResearchResource($research),201);
    }
    public function update(Request $request, Research $research)
    {
        $research->update($request->all());
        return response()->json(new ResearchResource($research),200);

    }
    public function delete(Research $research)
    {
        $research->delete();
        return response()->json(null, 204);
    }
}
