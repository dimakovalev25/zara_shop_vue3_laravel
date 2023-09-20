<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{

    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'a@a',
            'password' => bcrypt('aaa'),
            'email_verified_at' => now(),
            'is_admin' => true
        ]);
    }
}