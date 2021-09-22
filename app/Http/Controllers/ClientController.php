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
        return new ClientCollection(Client::paginate(10));
    }
    public function show(Client $client)
    {
        return response()->json(new ClientResource($client),200);
    }
    public function store(Request $request)
    {
        $client = Client::create($request->all());
        return response()->json(new ClientResource($client),201);
    }
    public function update(Request $request, Client $client)
    {
        $client->update($request->all());
        return response()->json(new ClientResource($client),200);

    }
    public function delete(Client $client)
    {
        $client->delete();
        return response()->json(null, 204);
    }
}
