<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Asset;
use App\Models\Category;
use Carbon\Carbon;

class AssetSeeder extends Seeder
{
    public function run(): void
    {
        $laptopCategory = Category::where('name', 'Laptops')->first();
        $desktopCategory = Category::where('name', 'Desktop Computers')->first();
        $monitorCategory = Category::where('name', 'Monitors')->first();
        $softwareCategory = Category::where('name', 'Software Licenses')->first();
        $mobileCategory = Category::where('name', 'Mobile Devices')->first();

        // Sample Laptops
        $laptops = [
            [
                'name' => 'Dell XPS 15',
                'asset_tag' => 'LAP-001',
                'category_id' => $laptopCategory->id,
                'serial_number' => 'DLL' . str_pad(rand(1, 999), 3, '0', STR_PAD_LEFT),
                'model' => 'XPS 15 9520',
                'status' => 'available',
                'location' => 'Jakarta, Indonesia',
                'purchase_date' => '2023-01-15',
                'purchase_cost' => 1799.99,
                'warranty_expires' => '2026-01-15',
                'manufacturer' => 'Dell',
                'version' => null,
                'notes' => '16GB RAM, 512GB SSD, Intel i7',
            ],
            [
                'name' => 'MacBook Pro 14"',
                'asset_tag' => 'LAP-002',
                'category_id' => $laptopCategory->id,
                'serial_number' => 'APP' . str_pad(rand(1, 999), 3, '0', STR_PAD_LEFT),
                'model' => 'MacBook Pro 14" M2',
                'status' => 'in_use',
                'location' => 'Singapore',
                'purchase_date' => '2023-03-20',
                'purchase_cost' => 1999.99,
                'warranty_expires' => '2026-03-20',
                'manufacturer' => 'Apple',
                'version' => null,
                'notes' => '16GB RAM, 1TB SSD, M2 Pro',
            ],
        ];

        // Sample Desktops
        $desktops = [
            [
                'name' => 'Dell OptiPlex',
                'asset_tag' => 'DSK-001',
                'category_id' => $desktopCategory->id,
                'serial_number' => 'OPT' . str_pad(rand(1, 999), 3, '0', STR_PAD_LEFT),
                'model' => 'OptiPlex 7090',
                'status' => 'available',
                'location' => 'Kuala Lumpur, Malaysia',
                'purchase_date' => '2023-02-10',
                'purchase_cost' => 999.99,
                'warranty_expires' => '2026-02-10',
                'manufacturer' => 'Dell',
                'version' => null,
                'notes' => '16GB RAM, 256GB SSD, Intel i5',
            ],
        ];

        // Sample Monitors
        $monitors = [
            [
                'name' => 'Dell UltraSharp',
                'asset_tag' => 'MON-001',
                'category_id' => $monitorCategory->id,
                'serial_number' => 'USH' . str_pad(rand(1, 999), 3, '0', STR_PAD_LEFT),
                'model' => 'U2419H',
                'status' => 'available',
                'location' => 'Bandung, Indonesia',
                'purchase_date' => '2023-01-20',
                'purchase_cost' => 299.99,
                'warranty_expires' => '2026-01-20',
                'manufacturer' => 'Dell',
                'version' => null,
                'notes' => '24" 1080p IPS Monitor',
            ],
        ];

        // Sample Software Licenses
        $software = [
            [
                'name' => 'Microsoft Office 365',
                'asset_tag' => 'SW-001',
                'category_id' => $softwareCategory->id,
                'serial_number' => 'MS' . str_pad(rand(1, 999), 3, '0', STR_PAD_LEFT),
                'model' => 'Business Premium',
                'status' => 'in_use',
                'location' => 'Global License',
                'purchase_date' => '2023-01-01',
                'purchase_cost' => 12.99,
                'warranty_expires' => '2024-01-01',
                'manufacturer' => 'Microsoft',
                'version' => '2023',
                'notes' => 'Monthly subscription per user',
            ],
        ];

        // Sample Mobile Devices
        $mobileDevices = [
            [
                'name' => 'iPhone 14 Pro',
                'asset_tag' => 'MOB-001',
                'category_id' => $mobileCategory->id,
                'serial_number' => 'IPH' . str_pad(rand(1, 999), 3, '0', STR_PAD_LEFT),
                'model' => 'iPhone 14 Pro',
                'status' => 'in_use',
                'location' => 'Surabaya, Indonesia',
                'purchase_date' => '2023-04-15',
                'purchase_cost' => 999.99,
                'warranty_expires' => '2024-04-15',
                'manufacturer' => 'Apple',
                'version' => null,
                'notes' => '256GB Storage',
            ],
        ];

        // Combine all assets and create them
        $allAssets = array_merge($laptops, $desktops, $monitors, $software, $mobileDevices);

        foreach ($allAssets as $asset) {
            Asset::create($asset);
        }
    }
} 