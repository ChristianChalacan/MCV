<?php

namespace App\Http\Controllers;

use App\Http\Resources\Productprovider;
use App\Http\Resources\ProductproviderCollection;
use App\Http\Resources\Providerproduct;
use App\Http\Resources\ProviderproductCollection;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Provider;


class SellController extends Controller
{
    public function index_provider_product()
    {
        return new ProviderproductCollection(Provider::paginate(10));
    }
    public function show_provider_product(Provider $provider)
    {
        return response()->json(new Providerproduct($provider),200);
    }
    public function index_product_provider()
    {
        return new ProductproviderCollection(Product::paginate(10));
    }
    public function show_product_provider(Product $product)
    {
        return response()->json(new Productprovider($product),200);
    }
}
