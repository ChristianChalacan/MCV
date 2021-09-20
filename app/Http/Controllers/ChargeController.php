<?php

namespace App\Http\Controllers;

use App\Models\Charge;
use Illuminate\Http\Request;

class ChargeController extends Controller
{
    public function index()
    {
        return Charge::all();
    }
    public function show(Charge $charge)
    {
        return $charge;
    }
    public function store(Request $request)
    {
        $charge = new Charge($request->all());
        $charge->save();
        return response()->json($charge,201);
    }
    public function update(Request $request, Charge $charge)
    {
        $charge->update($request->all());
        return response()->json($charge, 200);

    }
    public function delete(Charge $charge)
    {
        $charge->delete();
        return response()->json(null, 204);
    }
}
