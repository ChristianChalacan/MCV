<?php

namespace App\Http\Controllers;

use App\Models\Process;
use Illuminate\Http\Request;

class ProcessController extends Controller
{
    public function index()
    {
        return Process::all();
    }
    public function show(Process $process)
    {
        return $process;
    }
    public function store(Request $request)
    {
        $process = new Process($request->all());
        $process->save();
        return response()->json($process,201);
    }
    public function update(Request $request, Process $process)
    {
        $process->update($request->all());
        return response()->json($process, 200);

    }
    public function delete(Process $process)
    {
        $process->delete();
        return response()->json(null, 204);
    }
}
