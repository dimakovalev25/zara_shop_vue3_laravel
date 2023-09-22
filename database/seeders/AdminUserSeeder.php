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
            'email' => 'q@q',
            'password' => bcrypt('qqq'),
            'email_verified_at' => now(),
            'is_admin' => true
        ]);
    }
}