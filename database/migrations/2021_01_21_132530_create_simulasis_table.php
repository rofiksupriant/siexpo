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
            $table->unsignedBigInteger('casing_id')->nullable();
            $table->unsignedBigInteger('fan_id')->nullable();
            $table->unsignedBigInteger('hdd_id')->nullable();
            $table->unsignedBigInteger('keyboard_id')->nullable();
            $table->unsignedBigInteger('mouse_id')->nullable();
            $table->unsignedBigInteger('monitor_id')->nullable();
            $table->unsignedBigInteger('motherboard_id')->nullable();
            $table->unsignedBigInteger('mousepad_id')->nullable();
            $table->unsignedBigInteger('psu_id')->nullable();
            $table->unsignedBigInteger('processor_id')->nullable();
            $table->unsignedBigInteger('ram_id')->nullable();
            $table->unsignedBigInteger('ssd_id')->nullable();
            $table->unsignedBigInteger('vga_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
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
