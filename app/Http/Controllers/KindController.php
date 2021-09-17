<?php

namespace App\Http\Controllers;

use App\Models\Kind;
use Illuminate\Http\Request;

class KindController extends Controller
{
    public function index()
    {
        return Kind::all();
    }
    public function show(Kind $kind)
    {
        return $kind;
    }
    public function store(Request $request)
    {
        $kind = Kind::create($request->all());
        return response()->json($kind,201);
    }
    public function update(Request $request, Kind $kind)
    {
        $kind->update($request->all());
        return response()->json($kind, 200);

    }
    public function delete(Kind $kind)
    {
        $kind->delete();
        return response()->json(null, 204);
    }
}
