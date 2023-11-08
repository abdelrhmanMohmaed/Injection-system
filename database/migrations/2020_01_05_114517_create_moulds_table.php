<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMouldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moulds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('part_id');
            $table->foreign('part_id')->references('id')->on('part_numbers')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('machine_id');
            $table->foreign('machine_id')->references('id')->on('machines')->onDelete('cascade')->onUpdate('cascade');
            $table->string('speed1_open')->nullable();
            $table->string('force1_open')->nullable();
            $table->string('s_over1_open')->nullable();
            $table->string('speed2_open')->nullable();
            $table->string('force2_open')->nullable();
            $table->string('s_over2_open')->nullable();
            $table->string('speed3_open')->nullable();
            $table->string('force3_open')->nullable();
            $table->string('s_over3_open')->nullable();
            $table->string('speed4_open')->nullable();
            $table->string('force4_open')->nullable();
            $table->string('s_over4_open')->nullable();
            $table->string('speed5_open')->nullable();
            $table->string('force5_open')->nullable();
            $table->string('s_over5_open')->nullable();
            $table->string('speed1_close')->nullable();
            $table->string('force1_close')->nullable();
            $table->string('s_over1_close')->nullable();
            $table->string('speed2_close')->nullable();
            $table->string('force2_close')->nullable();
            $table->string('s_over2_close')->nullable();
            $table->string('speed3_close')->nullable();
            $table->string('force3_close')->nullable();
            $table->string('s_over3_close')->nullable();
            $table->string('speed4_close')->nullable();
            $table->string('force4_close')->nullable();
            $table->string('s_over4_close')->nullable();
            $table->string('speed5_close')->nullable();
            $table->string('force5_close')->nullable();
            $table->string('s_over5_close')->nullable();
            $table->string('clamping_pressure')->nullable();
            $table->string('mould_height')->nullable();
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
        Schema::dropIfExists('moulds');
    }
}
