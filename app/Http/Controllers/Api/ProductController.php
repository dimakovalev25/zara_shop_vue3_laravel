<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductListResource;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{


    public function index()
    {
        $perPage = request('per_page', 10);
        $search = request('search', '');

        return ProductListResource::collection(Product::query()->where('title', 'like', "%{$search}%")->paginate($perPage));
    }


    public function store(ProductRequest $request)
    {
        return new ProductResource(Product::create($request->validated()));
    }


    public function show(Product $product)
    {
        return new ProductResource($product);
    }

    public function update(Request $request, Product $product)
    {
        $product->update($request->validated());

        return new ProductResource($product);
    }


    public function destroy(Product $product)
    {
        $product->delete();

        return response()->noContent();
    }
}