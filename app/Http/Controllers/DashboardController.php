<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Get hardware assets (from categories of type 'hardware')
        $hardwareAssets = Asset::whereHas('category', function ($query) {
            $query->where('type', 'hardware');
        })->with('category')->get();

        // Get software assets (from categories of type 'license')
        $softwareAssets = Asset::whereHas('category', function ($query) {
            $query->where('type', 'license');
        })->with('category')->get();

        // Get asset counts by status
        $hardwareStatusCounts = $hardwareAssets->groupBy('status')
            ->map(function ($group) {
                return $group->count();
            });

        $softwareStatusCounts = $softwareAssets->groupBy('status')
            ->map(function ($group) {
                return $group->count();
            });

        // Get asset counts by location
        $locationCounts = Asset::select('location', DB::raw('count(*) as total'))
            ->groupBy('location')
            ->get();

        // Get total value of assets
        $totalHardwareValue = $hardwareAssets->sum('purchase_cost');
        $totalSoftwareValue = $softwareAssets->sum('purchase_cost');

        // Get assets with expiring warranties (next 30 days)
        $expiringWarranties = Asset::whereHas('category', function ($query) {
            $query->where('type', 'hardware');
        })
            ->whereNotNull('warranty_expires')
            ->whereBetween('warranty_expires', [now(), now()->addDays(30)])
            ->with('category')
            ->get();

        return view('dashboard', compact(
            'hardwareAssets',
            'softwareAssets',
            'hardwareStatusCounts',
            'softwareStatusCounts',
            'locationCounts',
            'totalHardwareValue',
            'totalSoftwareValue',
            'expiringWarranties'
        ));
    }
} 