<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::factory()->create([
            'id'=>1,
            'name'=>'plumbing',
            'description'=>'lorem ipsum det amit santur adipisci lit ere',
        ]);
        
        Category::factory()->create([
            'id'=>2,
            'name'=>'electricals',
            'description'=>'lorem ipsum det amit santur adipisci lit ere',
        ]);

        Category::factory()->create([
            'id'=>3,
            'name'=>'cleaning/Housekeeping',
            'description'=>'lorem ipsum det amit santur adipisci lit ere',
        ]);

        Category::factory()->create([
            'id'=>4,
            'name'=>'Carpentry',
            'description'=>'lorem ipsum det amit santur adipisci lit ere',
        ]);

        Category::factory()->create([
            'id'=>5,
            'name'=>'Masonry',
            'description'=>'lorem ipsum det amit santur adipisci lit ere',
        ]);

    }
}
