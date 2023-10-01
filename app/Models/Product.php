<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;


class Product extends Model
{
    use HasSlug, HasFactory;
    use SoftDeletes;
    use Filterable;

    protected $fillable = ['title', 'description', 'price', 'image', 'image_mime', 'image_size', 'created_by', 'updated_by'];

    protected $guarded = false;

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }
}
