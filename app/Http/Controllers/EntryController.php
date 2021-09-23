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
        $this->authorize('viewAny', Entry::class);
        return new EntryCollection(Entry::paginate(10));
    }
    public function show(Entry $entry)
    {
        $this->authorize('view', $entry);
        return response()->json(new EntryResource($entry),200);
    }
    public function store(Request $request)
    {
        $this->authorize('create', Entry::class);
        $entry = new Entry($request->all());
        $entry->save();
        return response()->json(new EntryResource($entry),201);
    }
    public function update(Request $request, Entry $entry)
    {
        $this->authorize('update', $entry);
        $entry->update($request->all());
        return response()->json(new EntryResource($entry),200);

    }
    public function delete(Entry $entry)
    {
        $this->authorize('delete', $entry);
        $entry->delete();
        return response()->json(null, 204);
    }
}
