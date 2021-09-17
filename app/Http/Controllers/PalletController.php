<?php

namespace App\Http\Controllers;

use App\Models\Pallet;
use Illuminate\Http\Request;

class PalletController extends Controller
{
    public function index()
    {
        return Pallet::all();
    }
    public function show(Pallet $pallet)
    {
        return $pallet;
    }
    public function store(Request $request)
    {
        $pallet = Pallet::create($request->all());
        return response()->json($pallet,201);
    }
    public function update(Request $request, Pallet $pallet)
    {
        $pallet->update($request->all());
        return response()->json($pallet, 200);

    }
    public function delete(Pallet $pallet)
    {
        $pallet->delete();
        return response()->json(null, 204);
    }
}
