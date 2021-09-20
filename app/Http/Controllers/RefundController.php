<?php

namespace App\Http\Controllers;

use App\Models\Refund;
use Illuminate\Http\Request;

class RefundController extends Controller
{
    public function index()
    {
        return Refund::all();
    }
    public function show(Refund $refund)
    {
        return $refund;
    }
    public function store(Request $request)
    {
        $refund = new Refund($request->all());
        $refund->save();
        return response()->json($refund,201);
    }
    public function update(Request $request, Refund $refund)
    {
        $refund->update($request->all());
        return response()->json($refund, 200);

    }
    public function delete(Refund $refund)
    {
        $refund->delete();
        return response()->json(null, 204);
    }
}
