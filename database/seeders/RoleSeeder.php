<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::factory()->create([
            'id' => 1,
            'name' => 'admin',
            'timestamp'=>now()
        ]);

        Role::factory()->create([
            'id' => 2,
            'name' => 'client',
            'timestamp'=>now()
        ]);

        Role::factory()->create([
            'id' => 3,
            'name' => 'agent',
            'timestamp'=>now()
        ]);
    }
}
