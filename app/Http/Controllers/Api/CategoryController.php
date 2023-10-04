<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;

class CategoryController extends Controller
{


    public function index()
    {

        /*$data = Category::all();
        return $data;*/

        $query = Category::all();
        return CategoryResource::collection($query);
    }


    public function store(CategoryRequest $request)
    {
        $data = $request->validated();
        $category = Category::create($data);

        return new CategoryResource($category);

    }

    public function show(Category $category)
    {

    }
    public function update(CategoryRequest $request, Category $category)
    {

    }

    public function destroy(Category $category)
    {
        $category->delete();

        return response()->noContent();
    }
}