<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = [
            [
                'name' => 'Intel',
                'product_type' => Brand::PROCESSOR,
            ],
            [
                'name' => 'AMD',
                'product_type' => Brand::PROCESSOR,
            ],
            [
                'name' => 'MSI',
                'product_type' => Brand::MOTHERBOARD,
            ],
            [
                'name' => 'Asus',
                'product_type' => Brand::MOTHERBOARD,
            ],
            [
                'name' => 'Gigabyte',
                'product_type' => Brand::MOTHERBOARD,
            ],
        ];

        Brand::insert($brands);
    }
}
