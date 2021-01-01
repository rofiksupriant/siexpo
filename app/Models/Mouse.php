<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mouse extends Model
{
    use HasFactory;

    protected $table = 'mice';

    protected $hidden = [
        'updated_at',
        'created_at'
    ];

    public static function brandDropdown()
    {
        $brands = Brand::where('product_type', Brand::MOUSE)->get();

        return $brands;
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }
}
