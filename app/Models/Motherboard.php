<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motherboard extends Model
{
    use HasFactory;

    public function processorBrand()
    {
        return $this->belongsTo(Brand::class, 'processor_brand_id', 'id');
    }

    protected $hidden = [
        'updated_at',
        'created_at'
    ];

    public static function brandDropdown()
    {
        $brands = Brand::where('product_type', Brand::MOTHERBOARD)->get();

        return $brands;
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }
}
