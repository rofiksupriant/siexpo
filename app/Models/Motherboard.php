<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motherboard extends Model
{
    use HasFactory;

    public function processors()
    {
        return $this->belongsToMany(Processor::class, 'processor_brand', 'brand');
    }

    public function processorBrandText()
    {
        return Processor::brandDropdown()[$this->processor_brand];
    }
}
