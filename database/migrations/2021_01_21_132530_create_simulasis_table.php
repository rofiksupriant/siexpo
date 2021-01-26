<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSimulasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('simulasis', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->string('name');

            $table->unsignedTinyInteger('compatibility')->nullable();
            $table->unsignedTinyInteger('processor_brand_id')->nullable();

            $table->unsignedBigInteger('processor_id')->nullable();
            $table->unsignedBigInteger('processor_qty')->nullable();

            $table->unsignedBigInteger('motherboard_id')->nullable();
            $table->unsignedBigInteger('motherboard_qty')->nullable();

            $table->unsignedBigInteger('ram_id')->nullable();
            $table->unsignedBigInteger('ram_qty')->nullable();

            $table->unsignedBigInteger('hdd_id')->nullable();
            $table->unsignedBigInteger('hdd_qty')->nullable();

            $table->unsignedBigInteger('ssd_id')->nullable();
            $table->unsignedBigInteger('ssd_qty')->nullable();

            $table->unsignedBigInteger('casing_id')->nullable();
            $table->unsignedBigInteger('casing_qty')->nullable();

            $table->unsignedBigInteger('vga_id')->nullable();
            $table->unsignedBigInteger('vga_qty')->nullable();

            $table->unsignedBigInteger('psu_id')->nullable();
            $table->unsignedBigInteger('psu_qty')->nullable();

            $table->unsignedBigInteger('keyboard_id')->nullable();
            $table->unsignedBigInteger('keyboard_qty')->nullable();

            $table->unsignedBigInteger('mouse_id')->nullable();
            $table->unsignedBigInteger('mouse_qty')->nullable();

            $table->unsignedBigInteger('mousepad_id')->nullable();
            $table->unsignedBigInteger('mousepad_qty')->nullable();

            $table->unsignedBigInteger('monitor_id')->nullable();
            $table->unsignedBigInteger('monitor_qty')->nullable();

            $table->unsignedBigInteger('fan_id')->nullable();
            $table->unsignedBigInteger('fan_qty')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('simulasis');
    }
}
