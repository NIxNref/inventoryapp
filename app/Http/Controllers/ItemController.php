<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    public function Index()
    {
        // Fetch the count of all items (total assets)
        $totalAssets = Products::count();
        
        // Fetch the count of all categories
        $totalCategories = Category::distinct()->count('id');
        
        // Fetch the total value of assets per category with category names
        $assetsByCategory = Products::select('categories.category_name', DB::raw('COUNT(*) as total_assets'))
                                    ->join('categories', 'categories.id', '=', 'products.category_id')
                                    ->groupBy('categories.category_name')
                                    ->get();

        // Prepare data for the pie chart
        $pieLabels = ['Total Assets', 'Total Categories'];
        $pieData = [$totalAssets, $totalCategories];
        
        // Prepare data for the bar chart
        $barLabels = $assetsByCategory->pluck('category_name'); // Category names for the bar chart
        $barData = $assetsByCategory->pluck('total_assets');  // Total assets count per category

        // Pass the data to the view
        return view('admin.dashboard', [
            'totalAssets' => $totalAssets,
            'totalCategories' => $totalCategories,
            'pieLabels' => $pieLabels,
            'pieData' => $pieData,
            'barLabels' => $barLabels,
            'barData' => $barData
        ]);
    }



    public function getItem()
    {
        $items = Products::all();
        return view('admin.item', ['items' => $items]);
    }

    public function getCategory()
    {
        // Retrieve categories with both name and description
        $categories = Category::select('id', 'category_name', 'description')->get();
        
        // Pass the data to the view
        return view('admin.category', ['categories' => $categories]);
    }

}
