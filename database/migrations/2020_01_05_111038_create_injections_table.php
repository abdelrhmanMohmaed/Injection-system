<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInjectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('injections', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('part_id');
            $table->foreign('part_id')->references('id')->on('part_numbers')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('machine_id');
            $table->foreign('machine_id')->references('id')->on('machines')->onDelete('cascade')->onUpdate('cascade');
            $table->string('speed1')->nullable();
            $table->string('press1')->nullable();
            $table->string('s_over1')->nullable();
            $table->string('speed2')->nullable();
            $table->string('press2')->nullable();
            $table->string('s_over2')->nullable();
            $table->string('speed3')->nullable();
            $table->string('press3')->nullable();
            $table->string('s_over3')->nullable();
            $table->string('speed4')->nullable();
            $table->string('press4')->nullable();
            $table->string('s_over4')->nullable();
            $table->string('speed5')->nullable();
            $table->string('press5')->nullable();
            $table->string('s_over5')->nullable();
            $table->string('injection_pressure')->nullable();
            $table->string('cooling_time')->nullable();
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
        Schema::dropIfExists('injections');
    }
}
