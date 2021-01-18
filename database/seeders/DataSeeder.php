<?php

namespace Database\Seeders;

use App\Models\Casing;
use App\Models\Fan;
use App\Models\HardDiskDrive;
use App\Models\Keyboard;
use App\Models\Monitor;
use App\Models\Motherboard;
use App\Models\Mouse;
use App\Models\MousePad;
use App\Models\PowerSuplyUnit;
use App\Models\Processor;
use App\Models\RandomAccessMemory;
use App\Models\SolidStateDrive;
use App\Models\VgaCard;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // !!! DON'T TOUCH THIS !!! - start 

        // get data from json file
        $hardDisks    = json_decode(file_get_contents(database_path("/data/hardDisks.json")), true);
        $keyboards    = json_decode(file_get_contents(database_path("/data/keyboards.json")), true);
        $mice         = json_decode(file_get_contents(database_path("/data/mice.json")), true);
        $monitors     = json_decode(file_get_contents(database_path("/data/monitors.json")), true);
        $motherboards = json_decode(file_get_contents(database_path("/data/motherboards.json")), true);
        $mousePads    = json_decode(file_get_contents(database_path("/data/mousePads.json")), true);
        $processors   = json_decode(file_get_contents(database_path("/data/processors.json")), true);
        $psu          = json_decode(file_get_contents(database_path("/data/psu.json")), true);
        $rams         = json_decode(file_get_contents(database_path("/data/rams.json")), true);
        $ssd          = json_decode(file_get_contents(database_path("/data/ssd.json")), true);
        $vgaCards     = json_decode(file_get_contents(database_path("/data/vgaCards.json")), true);
        $fans         = json_decode(file_get_contents(database_path("/data/fans.json")), true);
        $casings      = json_decode(file_get_contents(database_path("/data/casings.json")), true);

        // insert data to DB
        HardDiskDrive::insert($hardDisks);
        Keyboard::insert($keyboards);
        Mouse::insert($mice);
        MousePad::insert($mousePads);
        Monitor::insert($monitors);
        Motherboard::insert($motherboards);
        Processor::insert($processors);
        PowerSuplyUnit::insert($psu);
        RandomAccessMemory::insert($rams);
        SolidStateDrive::insert($ssd);
        VgaCard::insert($vgaCards);
        Fan::insert($fans);
        Casing::insert($fans);

        // update all data ( created_at && updated_at )
        DB::table('hard_disk_drives')->update(['created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        DB::table('keyboards')->update(['created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        DB::table('mice')->update(['created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        DB::table('mouse_pads')->update(['created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        DB::table('monitors')->update(['created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        DB::table('motherboards')->update(['created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        DB::table('processors')->update(['created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        DB::table('power_suply_units')->update(['created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        DB::table('random_access_memories')->update(['created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        DB::table('solid_state_drives')->update(['created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        DB::table('vga_cards')->update(['created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        DB::table('fans')->update(['created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        DB::table('casings')->update(['created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);

        // !!! DON'T TOUCH THIS !!! - end
    }
}
