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
        $categories = [
            [
                'name' => 'Laptops',
                'description' => 'Portable computers for work and development',
                'type' => 'hardware',
            ],
            [
                'name' => 'Desktop Computers',
                'description' => 'Workstation computers for office use',
                'type' => 'hardware',
            ],
            [
                'name' => 'Monitors',
                'description' => 'Display screens for computers',
                'type' => 'hardware',
            ],
            [
                'name' => 'Software Licenses',
                'description' => 'Software application licenses',
                'type' => 'license',
            ],
            [
                'name' => 'Mobile Devices',
                'description' => 'Smartphones and tablets',
                'type' => 'hardware',
            ],
            [
                'name' => 'Network Equipment',
                'description' => 'Routers, switches, and networking hardware',
                'type' => 'hardware',
            ],
            [
                'name' => 'Peripherals',
                'description' => 'Keyboards, mice, and other computer accessories',
                'type' => 'accessory',
            ],
            [
                'name' => 'Office Equipment',
                'description' => 'Printers, scanners, and other office hardware',
                'type' => 'hardware',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
