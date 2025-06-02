<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Products;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'type' // hardware/software/license etc.
    ];

    /**
     * Get the products for the category.
     */
    public function products()
    {
        return $this->hasMany(products::class);
    }

    public function assets()
    {
        return $this->hasMany(Asset::class);
    }
}

