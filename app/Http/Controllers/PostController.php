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
        return $images[0];
    }

    public function get()
    {
        return 'get!!!!';
    }
}
