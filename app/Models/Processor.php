<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Processor extends Model
{
    use HasFactory;

    const INTEL_BRAND = 1;
    const AMD_BRAND = 2;

    protected $hidden = [
        'updated_at',
        'created_at'
    ];
}
