<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use Illuminate\Http\Request;
use App\Http\Resources\Provider as ProviderResource;
use App\Http\Resources\ProviderCollection;

class ProviderController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Provider::class);
        return new ProviderCollection(Provider::paginate(10));
    }
    public function show(Provider $provider)
    {
        $this->authorize('view', $provider);
        return response()->json(new ProviderResource($provider),200);
    }
    public function store(Request $request)
    {
        $this->authorize('create', Provider::class);
        $provider = Provider::create($request->all());
        return response()->json(new ProviderResource($provider),201);
    }
    public function update(Request $request, Provider $provider)
    {
        $this->authorize('update', $provider);
        $provider->update($request->all());
        return response()->json(new ProviderResource($provider),200);

    }
    public function delete(Provider $provider)
    {
        $this->authorize('delete', $provider);
        $provider->delete();
        return response()->json(null, 204);
    }
}
