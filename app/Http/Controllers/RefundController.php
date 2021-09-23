<?php

namespace App\Http\Controllers;

use App\Models\Refund;
use Illuminate\Http\Request;
use App\Http\Resources\Refund as RefundResource;
use App\Http\Resources\RefundCollection;

class RefundController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Refund::class);
        return new RefundCollection(Refund::paginate(10));
    }
    public function show(Refund $refund)
    {
        $this->authorize('view', $refund);
        return response()->json(new RefundResource($refund),200);

    }
    public function store(Request $request)
    {
        $this->authorize('create', Refund::class);
        $refund = new Refund($request->all());
        $refund->save();
        return response()->json(new RefundResource($refund),201);
    }
    public function update(Request $request, Refund $refund)
    {
        $this->authorize('update', $refund);
        $refund->update($request->all());
        return response()->json(new RefundResource($refund),200);

    }
    public function delete(Refund $refund)
    {
        $this->authorize('delete', $refund);
        $refund->delete();
        return response()->json(null, 204);
    }
}
