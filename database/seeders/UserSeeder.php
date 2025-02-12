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
        //Already seeded these two comment them out if you add another seeder
        User::factory()->create([
            'role_id' => 1,
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'email_verified_at'=>now(),
            'password' => bcrypt('admin123'),
            'rating'=>null,
            'profile_details'=>fake()->text(20),
            'remember_token'=>Str::random(10)
        ]);

        User::factory()->create([
            'role_id' => 2,
            'name' => 'Jane Doe',
            'email' => 'janedoe1@ex.com',
            'email_verified_at'=>now(),
            'password' => bcrypt(value: 'janedoe1'),
            'rating'=>null,
            'profile_details'=>fake()->text(20),
            'remember_token'=>Str::random(10)
        ]);


        // User::factory()->count(10)->create();
    }
}
