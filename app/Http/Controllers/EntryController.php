<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use Illuminate\Http\Request;
use App\Http\Resources\Entry as EntryResource;
use App\Http\Resources\EntryCollection;

class EntryController extends Controller
{
    public function index()
    {
        return new EntryCollection(Entry::paginate(10));
    }
    public function show(Entry $entry)
    {
        return response()->json(new EntryResource($entry),200);
    }
    public function store(Request $request)
    {
        $entry = new Entry($request->all());
        $entry->save();
        return response()->json(new EntryResource($entry),201);
    }
    public function update(Request $request, Entry $entry)
    {
        $entry->update($request->all());
        return response()->json(new EntryResource($entry),200);

    }
    public function delete(Entry $entry)
    {
        $entry->delete();
        return response()->json(null, 204);
    }
}
