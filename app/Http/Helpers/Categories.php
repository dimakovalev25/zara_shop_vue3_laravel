<?php

namespace App\Http\Helpers;


use App\Http\Resources\CategoryResource;
use App\Models\Category;

class Categories
{
    public static function getCategories()
    {
        $data = Category::all();
        return $data;
//        return CategoryResource::collection($query);
    }

}