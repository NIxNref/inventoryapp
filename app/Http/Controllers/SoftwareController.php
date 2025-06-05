<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class SoftwareController extends Controller
{
    public function index()
    {
        $software = Asset::whereHas('category', function ($query) {
            $query->where('type', 'license');
        })->with(['category', 'owner'])
          ->orderBy('inventory_id')
          ->paginate(10);

        return view('software.index', compact('software'));
    }

    public function create()
    {
        $categories = Category::where('type', 'license')->get();
        $users = User::where('is_deleted', 0)->get();
        return view('software.create', compact('categories', 'users'));
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'inventory_id' => 'required|string|max:255|unique:assets',
                'category_id' => 'required|exists:categories,id',
                'owner_id' => 'required|exists:users,id',
                'serial_number' => 'nullable|string|max:255',
                'model' => 'nullable|string|max:255',
                'status' => 'required|in:available,in_use,expired',
                'expiry_date' => 'nullable|date',
                'notes' => 'nullable|string',
                'version' => 'nullable|string|max:255',
            ]);

            // Auto-update status to expired if expiry date is in the past
            if (!empty($validated['expiry_date']) && $validated['expiry_date'] < now()) {
                $validated['status'] = 'expired';
            }

            DB::beginTransaction();

            $software = Asset::create($validated);

            DB::commit();

            return redirect()->route('software.index')
                ->with('success', 'Software license added successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error creating software license: ' . $e->getMessage());
            
            return redirect()->back()
                ->withInput()
                ->with('error', 'Error creating software license. Please try again.');
        }
    }

    public function edit(Asset $software)
    {
        $categories = Category::where('type', 'license')->get();
        $users = User::where('is_deleted', 0)->get();
        return view('software.edit', compact('software', 'categories', 'users'));
    }

    public function update(Request $request, Asset $software)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'inventory_id' => 'required|string|max:255|unique:assets,inventory_id,' . $software->id,
                'category_id' => 'required|exists:categories,id',
                'owner_id' => 'required|exists:users,id',
                'serial_number' => 'nullable|string|max:255',
                'model' => 'nullable|string|max:255',
                'status' => 'required|in:available,in_use,expired',
                'expiry_date' => 'nullable|date',
                'notes' => 'nullable|string',
                'version' => 'nullable|string|max:255',
            ]);

            // Auto-update status to expired if expiry date is in the past
            if (!empty($validated['expiry_date']) && $validated['expiry_date'] < now()) {
                $validated['status'] = 'expired';
            }

            DB::beginTransaction();

            $software->update($validated);

            DB::commit();

            return redirect()->route('software.index')
                ->with('success', 'Software license updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error updating software license: ' . $e->getMessage());
            
            return redirect()->back()
                ->withInput()
                ->with('error', 'Error updating software license. Please try again.');
        }
    }

    public function destroy(Asset $software)
    {
        try {
            DB::beginTransaction();
            
            $software->delete();
            
            DB::commit();

            return redirect()->route('software.index')
                ->with('success', 'Software license deleted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error deleting software license: ' . $e->getMessage());
            
            return redirect()->back()
                ->with('error', 'Error deleting software license. Please try again.');
        }
    }
} 