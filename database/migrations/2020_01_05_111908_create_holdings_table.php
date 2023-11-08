<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHoldingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('holdings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('part_id');
            $table->foreign('part_id')->references('id')->on('part_numbers')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('machine_id');
            $table->foreign('machine_id')->references('id')->on('machines')->onDelete('cascade')->onUpdate('cascade');
            $table->string('speed')->nullable();
            $table->string('ramp_time')->nullable();
            $table->string('press1')->nullable();
            $table->string('time1')->nullable();
            $table->string('press2')->nullable();
            $table->string('time2')->nullable();
            $table->string('press3')->nullable();
            $table->string('time3')->nullable();
            $table->string('press4')->nullable();
            $table->string('time4')->nullable();
            $table->string('press5')->nullable();
            $table->string('time5')->nullable();
            $table->string('cooling_time')->nullable();
            $table->string('holding_pressure_time')->nullable();
            $table->string('switch_over_volume')->nullable();
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
        Schema::dropIfExists('holdings');
    }
}
