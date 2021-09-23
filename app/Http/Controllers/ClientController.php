<?php

namespace App\Http\Controllers;

use App\Http\Resources\ClientCollection;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Resources\Client as ClientResource;

class ClientController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Client::class);
        return new ClientCollection(Client::paginate(10));
    }
    public function show(Client $client)
    {
        $this->authorize('view', $client);
        return response()->json(new ClientResource($client),200);
    }
    public function store(Request $request)
    {
        $this->authorize('create', Client::class);
        $client = Client::create($request->all());
        return response()->json(new ClientResource($client),201);
    }
    public function update(Request $request, Client $client)
    {
        $this->authorize('update', $client);
        $client->update($request->all());
        return response()->json(new ClientResource($client),200);

    }
    public function delete(Client $client)
    {
        $this->authorize('delete', $client);
        $client->delete();
        return response()->json(null, 204);
    }
}
