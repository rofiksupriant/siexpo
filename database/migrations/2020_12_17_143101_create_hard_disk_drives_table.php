<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHardDiskDrivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hard_disk_drives', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->integer('capacity')->nullable();
            $table->integer('price');
            $table->unsignedBigInteger('brand_id')->nullable();
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
        Schema::dropIfExists('hard_disk_drives');
    }
}
