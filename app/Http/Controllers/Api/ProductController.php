<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductListResource;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Carbon\Carbon;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class ProductController extends Controller
{


    public function index()
    {
        $perPage = request('per_page', 10);
        $search = request('search', '');



        return ProductListResource::collection(Product::query()->where('title', 'like', "%{$search}%")->paginate($perPage));
    }


/*    public function store(ProductRequest $request)
    {
        return new ProductResource(Product::create($request->validated()));
    }*/

    public function store(ProductRequest $request)
    {
        $data = $request->validated();
/*        $data['created_by'] = $request->user()->id;
        $data['updated_by'] = $request->user()->id;
        $data['created_by'] = Carbon::create();
        $data['updated_by'] =  Carbon::create();*/
        $data['created_by'] = 1;
        $data['updated_by'] =  1;

        $image = $data['image'] ?? null;
        // Check if image was given and save on local file system
        if ($image) {
            $relativePath = $this->saveImage($image);
//            $data['image'] = $relativePath;
            $data['image'] = URL::to(Storage::url($relativePath));
            $data['image_mime'] = $image->getClientMimeType();
            $data['image_size'] = $image->getSize();
        }
        $product = Product::create($data);
        return new ProductResource($product);

    }

    private function saveImage(UploadedFile $image)
    {
        $path = 'images/' . Str::random();
        if (!Storage::exists($path)) {
            Storage::makeDirectory($path, 0755, true);
        }
        if (!Storage::putFileAS('public/'.$path, $image, $image->getClientOriginalName())) {
            throw new \Exception("Unable to save file \"{$image->getClientOriginalName()}\"");
        }
        return $path . '/' . $image->getClientOriginalName();
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