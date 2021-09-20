<?php

namespace App\Http\Controllers;

use App\Models\Dispatch;
use Illuminate\Http\Request;

class DispatchController extends Controller
{
    public function index()
    {
        return Dispatch::all();
    }
    public function show(Dispatch $dispatch)
    {
        return $dispatch;
    }
    public function store(Request $request)
    {
        $dispatch = new Dispatch($request->all());
        $dispatch->save();
        return response()->json($dispatch,201);
    }
    public function update(Request $request, Dispatch $dispatch)
    {
        $dispatch->update($request->all());
        return response()->json($dispatch, 200);

    }
    public function delete(Dispatch $dispatch)
    {
        $dispatch->delete();
        return response()->json(null, 204);
    }
}
