<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{

    public function run(): void
    {
        Country::create([
                'code' => 'ru',
                'name' => 'russia',

            ]
        );
        Country::create([
                'code' => 'by',
                'name' => 'belarus',

            ]
        );
    }
}
