<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilterRequest;
use App\Models\Product;


class SearchController extends Controller
{
    public function index(FilterRequest $request)
    {

        $title = $request['title'];
        $products = Product::where('title', 'like', '%' . $title . '%')->paginate(12);
        return view('product.index', compact('products'));

    }

    public function searchCategory(FilterRequest $request,  $category)
    {

        $products = Product::where('category_id', '=' , $category)->paginate(12);
        return view('product.index', compact('products'));

    }
}
