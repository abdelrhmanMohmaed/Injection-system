<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEjectorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ejectors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('part_id');
            $table->foreign('part_id')->references('id')->on('part_numbers')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('machine_id');
            $table->foreign('machine_id')->references('id')->on('machines')->onDelete('cascade')->onUpdate('cascade');
            $table->string('speed1_advance')->nullable();
            $table->string('force1_advance')->nullable();
            $table->string('s_over1_advance')->nullable();
            $table->string('speed2_advance')->nullable();
            $table->string('force2_advance')->nullable();
            $table->string('s_over2_advance')->nullable();
            $table->string('speed3_advance')->nullable();
            $table->string('force3_advance')->nullable();
            $table->string('s_over3_advance')->nullable();
            $table->string('speed4_advance')->nullable();
            $table->string('force4_advance')->nullable();
            $table->string('s_over4_advance')->nullable();

            $table->string('speed1_retract')->nullable();
            $table->string('force1_retract')->nullable();
            $table->string('s_over1_retract')->nullable();
            $table->string('speed2_retract')->nullable();
            $table->string('force2_retract')->nullable();
            $table->string('s_over2_retract')->nullable();
            $table->string('speed3_retract')->nullable();
            $table->string('force3_retract')->nullable();
            $table->string('s_over3_retract')->nullable();
            $table->string('speed4_retract')->nullable();
            $table->string('force4_retract')->nullable();
            $table->string('s_over4_retract')->nullable();
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
        Schema::dropIfExists('ejectors');
    }
}
