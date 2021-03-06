<?php

namespace App\Http\Controllers;

use App\Models\Invoiced;
use Illuminate\Http\Request;
use App\Http\Resources\Invoiced as InvoicedResource;
use App\Http\Resources\InvoicedCollection;

class InvoicedController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Invoiced::class);
        return new InvoicedCollection(Invoiced::paginate(10));
    }
    public function show(Invoiced $invoiced)
    {
        $this->authorize('view', $invoiced);
        return response()->json(new InvoicedResource($invoiced),200);
    }
    public function store(Request $request)
    {
        $this->authorize('create', Invoiced::class);
        $invoiced = new Invoiced($request->all());
        $invoiced->save();
        return response()->json(new InvoicedResource($invoiced),201);
    }
    public function update(Request $request, Invoiced $invoiced)
    {
        $this->authorize('update', $invoiced);
        $invoiced->update($request->all());
        return response()->json(new InvoicedResource($invoiced),200);

    }
    public function delete(Invoiced $invoiced)
    {
        $this->authorize('delete', $invoiced);
        $invoiced->delete();
        return response()->json(null, 204);
    }
}
