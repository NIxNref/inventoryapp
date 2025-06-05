<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    public function index()
    {
        $assets = Asset::whereHas('category', function ($query) {
            $query->whereIn('type', ['hardware', 'accessory']);
        })->with(['category', 'owner'])
          ->orderBy('inventory_id')
          ->paginate(10);

        return view('assets.index', compact('assets'));
    }

    public function create()
    {
        $categories = Category::whereIn('type', ['hardware', 'accessory'])->get();
        $users = User::where('is_deleted', 0)->get();
        return view('assets.create', compact('categories', 'users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'inventory_id' => 'required|string|max:255|unique:assets',
            'category_id' => 'required|exists:categories,id',
            'owner_id' => 'required|exists:users,id',
            'serial_number' => 'nullable|string|max:255',
            'model' => 'nullable|string|max:255',
            'status' => 'required|in:available,in_use,maintenance',
            'location' => 'required|string|max:255',
            'purchase_date' => 'nullable|date',
            'purchase_cost' => 'nullable|numeric',
            'warranty_expires' => 'nullable|date',
            'notes' => 'nullable|string',
            'manufacturer' => 'nullable|string|max:255',
            'version' => 'nullable|string|max:255',
        ]);

        Asset::create($validated);

        return redirect()->route('assets.index')
            ->with('success', 'Asset created successfully.');
    }

    public function show(Asset $asset)
    {
        return view('assets.show', compact('asset'));
    }

    public function edit(Asset $asset)
    {
        $categories = Category::whereIn('type', ['hardware', 'accessory'])->get();
        $users = User::where('is_deleted', 0)->get();
        return view('assets.edit', compact('asset', 'categories', 'users'));
    }

    public function update(Request $request, Asset $asset)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'inventory_id' => 'required|string|max:255|unique:assets,inventory_id,' . $asset->id,
            'category_id' => 'required|exists:categories,id',
            'owner_id' => 'required|exists:users,id',
            'serial_number' => 'nullable|string|max:255',
            'model' => 'nullable|string|max:255',
            'status' => 'required|in:available,in_use,maintenance',
            'location' => 'required|string|max:255',
            'purchase_date' => 'nullable|date',
            'purchase_cost' => 'nullable|numeric',
            'warranty_expires' => 'nullable|date',
            'notes' => 'nullable|string',
            'manufacturer' => 'nullable|string|max:255',
            'version' => 'nullable|string|max:255',
        ]);

        $asset->update($validated);

        return redirect()->route('assets.index')
            ->with('success', 'Asset updated successfully.');
    }

    public function destroy(Asset $asset)
    {
        $asset->delete();

        return redirect()->route('assets.index')
            ->with('success', 'Asset deleted successfully.');
    }
} 