<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'role_id' => 1,
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'email_verified_at'=>now(),
            'password' => bcrypt('admin123'),
            'rating'=>'null',
            'profile_details'=>fake()->text(20),
            'remember_token'=>Str::random(10),
            'timestamp'=>now()
        ]);

        User::factory()->count(10)->create();
    }
}
