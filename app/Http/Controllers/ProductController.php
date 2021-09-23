<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Resources\Product as ProductResource;
use App\Http\Resources\ProductCollection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Product::class);
        return new ProductCollection(Product::paginate(10));
    }
    public function show(Product $product)
    {
        $this->authorize('view', $product);
        return response()->json(new ProductResource($product),200);
    }
    public function store(Request $request)
    {
        $this->authorize('create', Product::class);
        $product = new Product;
        $product->name = $request->name;
        $product->save();
        $product->providers()->sync($request->provider_id,false);
        return response()->json(new ProductResource($product),201);
    }
    public function update(Request $request, Product $product)
    {
        $this->authorize('update', $product);
        $product->update($request->all());
        return response()->json(new ProductResource($product),200);

    }
    public function delete(Product $product)
    {
        $this->authorize('delete', $product);
        $product->delete();
        return response()->json(null, 204);
    }
}
