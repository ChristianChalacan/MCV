<?php

namespace App\Http\Controllers;

use App\Models\Waste;
use Illuminate\Http\Request;

class WasteController extends Controller
{
    public function index()
    {
        return Waste::all();
    }
    public function show(Waste $waste)
    {
        return $waste;
    }
    public function store(Request $request)
    {
        $waste = Waste::create($request->all());
        return response()->json($waste,201);
    }
    public function update(Request $request, Waste $waste)
    {
        $waste->update($request->all());
        return response()->json($waste, 200);

    }
    public function delete(Waste $waste)
    {
        $waste->delete();
        return response()->json(null, 204);
    }
}
