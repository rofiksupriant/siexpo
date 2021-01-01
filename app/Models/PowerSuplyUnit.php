<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PowerSuplyUnit extends Model
{
    use HasFactory;

    protected $hidden = [
        'updated_at',
        'created_at'
    ];

    public static function brandDropdown()
    {
        $brands = Brand::where('product_type', Brand::PSU)->get();

        return $brands;
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }
}
