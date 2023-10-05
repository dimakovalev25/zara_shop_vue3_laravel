<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\SlugOptions;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = false;

    public function category()
    {
        return $this->belongsTo(Product::class);
    }
    public function parent()
    {
        return $this->belongsTo(Category::class);
    }

}
