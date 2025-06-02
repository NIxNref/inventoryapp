<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'asset_tag',
        'serial_number',
        'model',
        'status',
        'category_id',
        'location',
        'purchase_date',
        'purchase_cost',
        'warranty_expires',
        'notes',
        'assigned_to',
        'manufacturer',
        'version'
    ];

    protected $casts = [
        'purchase_date' => 'date',
        'warranty_expires' => 'date',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function assignedTo()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }
} 