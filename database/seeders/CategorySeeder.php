<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{

    public function run(): void
    {
        Category::create([
                'title' => 'iphone',
                'description' => 'iphone',

            ]
        );
        Category::create([
                'title' => 'apple watch',
                'description' => 'watch',

            ]
        );
        Category::create([
                'title' => 'ipad',
                'description' => 'ipad',

            ]
        );
    }
}
