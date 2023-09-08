<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(Request $request)
    {


        $data = $request->all();

        $images = $data['files'];
        unset($data['files']);

/*
        foreach ($images as $image) {
            $name = Carbon::now() . '_' . $image->getClientOriginalName() . '.' . $image->getClientOriginalExtension();
            $path = \Storage::disk('public')->putFileAs('/images', $image, $name);
            Post::create([
                'title' => $data['title'],
                'path' => $path,
                'url' => $path
            ]);

        }*/


        return $images[0];
    }

    public function get()
    {
        return 'get!!!!';
    }
}
