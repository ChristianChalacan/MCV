<?php

namespace App\Http\Controllers;

use App\Models\Invoiced;
use Illuminate\Http\Request;

class InvoicedController extends Controller
{
    public function index()
    {
        return Invoiced::all();
    }
    public function show(Invoiced $invoiced)
    {
        return $invoiced;
    }
    public function store(Request $request)
    {
        $invoiced = Invoiced::create($request->all());
        return response()->json($invoiced,201);
    }
    public function update(Request $request, Invoiced $invoiced)
    {
        $invoiced->update($request->all());
        return response()->json($invoiced, 200);

    }
    public function delete(Invoiced $invoiced)
    {
        $invoiced->delete();
        return response()->json(null, 204);
    }
}
