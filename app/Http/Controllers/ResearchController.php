<?php

namespace App\Http\Controllers;

use App\Models\Research;
use Illuminate\Http\Request;

class ResearchController extends Controller
{
    public function index()
    {
        return Research::all();
    }
    public function show(Research $research)
    {
        return $research;
    }
    public function store(Request $request)
    {
        $research = Research::create($request->all());
        return response()->json($research,201);
    }
    public function update(Request $request, Research $research)
    {
        $research->update($request->all());
        return response()->json($research, 200);

    }
    public function delete(Research $research)
    {
        $research->delete();
        return response()->json(null, 204);
    }
}
