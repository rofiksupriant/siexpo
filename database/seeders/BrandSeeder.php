<?php

namespace Database\Seeders;

use App\Models\Brand;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DON'T TOUCH THIS !!! - start 

        $brands = [
            [
                'name' => 'Intel',
                'product_type' => Brand::PROCESSOR,
            ],
            [
                'name' => 'AMD',
                'product_type' => Brand::PROCESSOR,
            ],            [
                'name' => 'Ati Radeon',
                'product_type' => Brand::VGA,
            ],
            [
                'name' => 'Nvidia Gforce',
                'product_type' => Brand::VGA,
            ],
        ];

        Brand::insert($brands);

        DB::table('brands')->update([
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        // DON'T TOUCH THIS !!! - end
    }
}
