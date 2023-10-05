<?php

namespace App\Http\Controllers;

use App\Http\Filters\ProductFilter;
use App\Http\Requests\FilterRequest;
use App\Models\Product;


class SearchController extends Controller
{
    public function index(FilterRequest $request)
    {
 /*       $data = $request->validated();
        $filter = app()->make(ProductFilter::class, ['queryParams' => array_filter($data)]);
        $products = Product::query()->filter($filter)->paginate(4)->withQueryString();*/


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
