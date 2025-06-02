<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Category;
use Illuminate\Http\Request;

class SoftwareController extends Controller
{
    public function index()
    {
        $software = Asset::whereHas('category', function ($query) {
            $query->where('type', 'license');
        })->with('category')->paginate(10);

        return view('software.index', compact('software'));
    }

    public function create()
    {
        $categories = Category::where('type', 'license')->get();
        return view('software.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'asset_tag' => 'required|string|max:255|unique:assets',
            'category_id' => 'required|exists:categories,id',
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

        return redirect()->route('software.index')
            ->with('success', 'Software license added successfully.');
    }

    public function edit(Asset $software)
    {
        $categories = Category::where('type', 'license')->get();
        return view('software.edit', compact('software', 'categories'));
    }

    public function update(Request $request, Asset $software)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'asset_tag' => 'required|string|max:255|unique:assets,asset_tag,' . $software->id,
            'category_id' => 'required|exists:categories,id',
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

        $software->update($validated);

        return redirect()->route('software.index')
            ->with('success', 'Software license updated successfully.');
    }

    public function destroy(Asset $software)
    {
        $software->delete();

        return redirect()->route('software.index')
            ->with('success', 'Software license deleted successfully.');
    }
} 