<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'category_name' => 'Electronics',
            'description' => 'Electronic items',
        ]);

        Category::create([
            'category_name' => 'Automotive',
            'description' => 'Automotive items',
        ]);

        Category::create([
            'category_name' => 'Laptop',
            'description' => 'Laptop items',
        ]);

        Category::create([
            'category_name' => 'Handphone',
            'description' => 'Handphone items',
        ]);
    }
}
