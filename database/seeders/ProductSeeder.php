<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Ramsey\Uuid\Type\Integer;

class ProductSeeder extends Seeder
{

    public function run()
    {

/*        for ($i = 0; $i < 15; $i++){

            DB::table('products')->insert([
                'title' => Str::random(10),
                'slug' => Str::random(10),
                'description' => Str::random(15),
                'price' => random_int(1,100),
            ]);
        }*/

        Product::factory(2)->create();

    }
}