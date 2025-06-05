<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Asset;
use App\Models\Category;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\IOFactory;

class AssetSeeder extends Seeder
{
    public function run(): void
    {
        $inputFileName = storage_path('app/items.xlsx');
        
        if (!file_exists($inputFileName)) {
            throw new \Exception("Excel file not found at: {$inputFileName}");
        }

        try {
            $spreadsheet = IOFactory::load($inputFileName);
            $worksheet = $spreadsheet->getActiveSheet();
            $rows = $worksheet->toArray();
            
            // Remove header row
            array_shift($rows);
            
            $allAssets = [];
            
            foreach ($rows as $row) {
                // Skip empty rows
                if (empty(array_filter($row))) {
                    continue;
                }

                // Map Excel columns to asset fields
                // Column order:
                // 0: name
                // 1: inventory_id
                // 2: serial_number
                // 3: model
                // 4: status
                // 5: category_id
                // 6: owner_id
                // 7: location
                // 8: purchase_date
                // 9: purchase_cost
                // 10: warranty_expires
                // 11: notes
                // 12: manufacturer
                // 13: version
                $asset = [
                    'name' => $row[0] ?? null,
                    'inventory_id' => $row[1] ?? null,
                    'serial_number' => $row[2] ?? null,
                    'model' => $row[3] ?? null,
                    'status' => $row[4] ?? 'available',
                    'category_id' => $row[5] ?? 1, // Default to category ID 1 if not specified
                    'owner_id' => $row[6] ?? 1, // Default to user ID 1 if not specified
                    'location' => $row[7] ?? null,
                    'purchase_date' => null,
                    'purchase_cost' => $row[9] ?? null,
                    'warranty_expires' => null,
                    'notes' => $row[11] ?? null,
                    'manufacturer' => $row[12] ?? null,
                    'version' => $row[13] ?? null
                ];

                // Handle dates
                if (!empty($row[8])) {
                    try {
                        $asset['purchase_date'] = Carbon::createFromFormat('Y-m-d', $row[8])->format('Y-m-d');
                    } catch (\Exception $e) {
                        // If date parsing fails, leave as null
                    }
                }

                if (!empty($row[10])) {
                    try {
                        $asset['warranty_expires'] = Carbon::createFromFormat('Y-m-d', $row[10])->format('Y-m-d');
                    } catch (\Exception $e) {
                        // If date parsing fails, leave as null
                    }
                }
                
                $allAssets[] = $asset;
            }

            // Create all assets
            foreach ($allAssets as $asset) {
                Asset::create($asset);
            }
            
        } catch (\Exception $e) {
            throw new \Exception('Error loading Excel file: ' . $e->getMessage());
        }
    }
} 