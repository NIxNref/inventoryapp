<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'inventory_id',
        'serial_number',
        'model',
        'status',
        'category_id',
        'owner_id',
        'location',
        'purchase_date',
        'purchase_cost',
        'warranty_expires',
        'expiry_date',
        'notes',
        'assigned_to',
        'manufacturer',
        'version'
    ];

    protected $casts = [
        'purchase_date' => 'date',
        'warranty_expires' => 'date',
        'expiry_date' => 'date',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function assignedTo()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
} 