<?php

namespace App\Http\Controllers;

use App\Models\Process;
use Illuminate\Http\Request;
use App\Http\Resources\Process as ProcessResource;
use App\Http\Resources\ProductCollection;

class ProcessController extends Controller
{
    public function index()
    {
        return new ProductCollection(Process::paginate(10));
    }
    public function show(Process $process)
    {
        return response()->json(new ProcessResource($process),200);
    }
    public function store(Request $request)
    {
        $process = new Process($request->all());
        $process->save();
        return response()->json(new ProcessResource($process),201);
    }
    public function update(Request $request, Process $process)
    {
        $process->update($request->all());
        return response()->json(new ProcessResource($process),200);

    }
    public function delete(Process $process)
    {
        $process->delete();
        return response()->json(null, 204);
    }
}
