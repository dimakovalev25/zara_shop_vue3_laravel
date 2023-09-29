<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {

        $products = Product::query()->paginate(10);
        return view('product.index',compact('products'));
    }

    public function show(Product $product)
    {
        return view('product.view' , [ 'product'=>$product]);
    }
}
