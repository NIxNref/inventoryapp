<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use PhpOffice\PhpSpreadsheet\IOFactory;
use App\Models\Products;
use App\Models\Category; // Import Category model

class ItemSeeder extends Seeder
{
    public function run()
    {
        // Path ke file Excel
        $filePath = storage_path('app/items.xlsx');

        // Load file Excel
        $spreadsheet = IOFactory::load($filePath);
        $worksheet = $spreadsheet->getActiveSheet();

        // Looping baris demi baris untuk mengambil data dari Excel
        foreach ($worksheet->getRowIterator() as $rowIndex => $row) {
            // Lewati baris pertama jika itu adalah header
            if ($rowIndex == 1) continue;

            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(false);

            $data = [];
            foreach ($cellIterator as $cell) {
                $data[] = $cell->getValue();  // Menyimpan setiap kolom dalam array
            }

            // Check if the category_id exists in the categories table
            $category = Category::find($data[2]); // Assuming the category_id is in the 3rd column of your Excel file

            if ($category) {
                // Insert ke database
                Products::create([
                    'product_name' => $data[0],
                    'product_code' => $data[1],
                    'category_id' => $data[2], // Category ID from the Excel file
                    'price' => $data[3],
                    'stock' => $data[4],
                    'description' => $data[5],
                    'is_deleted' => $data[6],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                // Optionally, handle the case where category_id doesn't exist
                // For example, skip or log an error
                \Log::warning('Category ID ' . $data[2] . ' not found for product: ' . $data[0]);
            }
        }
    }
}
