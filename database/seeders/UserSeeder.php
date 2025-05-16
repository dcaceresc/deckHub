<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            ['name' => 'admin', 'email' => 'admin@admin.com', 'password' => Hash::make('password'), 'role_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'user', 'email' => 'user@user.com', 'password' => Hash::make('password'), 'role_id' => 2, 'created_at' => now(), 'updated_at' => now()]
        ]);
    }
}
