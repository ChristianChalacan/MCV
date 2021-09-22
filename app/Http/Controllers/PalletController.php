<?php

namespace App\Http\Controllers;

use App\Models\Pallet;
use Illuminate\Http\Request;
use App\Http\Resources\Pallet as PalletResource;
use App\Http\Resources\PalletCollection;

class PalletController extends Controller
{
    public function index()
    {
        return new PalletCollection(Pallet::paginate(10));
    }
    public function show(Pallet $pallet)
    {
        return response()->json(new PalletResource($pallet),200);
    }
    public function store(Request $request)
    {
        $pallet = new Pallet($request->all());
        $pallet->save();
        return response()->json(new PalletResource($pallet),201);
    }
    public function update(Request $request, Pallet $pallet)
    {
        $pallet->update($request->all());
        return response()->json(new PalletResource($pallet),200);

    }
    public function delete(Pallet $pallet)
    {
        $pallet->delete();
        return response()->json(null, 204);
    }
}
