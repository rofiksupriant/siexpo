<?php

namespace Database\Seeders;

use App\Models\Processor;
use Illuminate\Database\Seeder;

class ProcessorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Processor::create([
            'name' => 'Intel Core i7-4770 3.4GH - Cache 8MB [Tray] Socket LGA 1150 - Hashwell Refresh Series',
            'price' => 1935000,
            'brand' => Processor::INTEL_BRAND
        ]);
    }
}
