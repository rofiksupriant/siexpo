<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    // product type
    const PROCESSOR   = 1;
    const MOTHERBOARD = 2;
    const RAM         = 3;
    const SSD         = 4;
    const HDD         = 5;
    const MONITOR     = 6;
    const MOUSE       = 7;
    const KEYBOARD    = 8;
    const VGA         = 9;
    const PSU         = 10;
    const MOUSE_PAD   = 11;
    const FAN         = 12;
    const CASING      = 13;

    protected $hidden = [
        'updated_at',
        'created_at'
    ];

    public static function productDropdown()
    {
        return [
            self::PROCESSOR => "Processor",
            self::MOTHERBOARD => "Motherboard",
            self::RAM => "RAM",
            self::SSD => "SSD",
            self::HDD => "HDD",
            self::MONITOR => "Monitor",
            self::MOUSE => "Mouse",
            self::KEYBOARD => "Keyboard",
            self::VGA => "VGA",
            self::PSU => "Power Suply",
            self::FAN => "Fan",
            self::CASING => "Casing",
        ];
    }

    public function productTypeText()
    {
        return self::productDropdown()[$this->product_type];
    }
}
