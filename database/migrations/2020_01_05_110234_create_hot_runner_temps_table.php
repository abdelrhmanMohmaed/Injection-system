<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotRunnerTempsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hot_runner_temps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('part_id');
            $table->foreign('part_id')->references('id')->on('part_numbers')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('machine_id');
            $table->foreign('machine_id')->references('id')->on('machines')->onDelete('cascade')->onUpdate('cascade');
            $table->string('zone1')->nullable();
            $table->string('zone2')->nullable();
            $table->string('zone3')->nullable();
            $table->string('zone4')->nullable();
            $table->string('zone5')->nullable();
            $table->string('zone6')->nullable();
            $table->string('zone7')->nullable();
            $table->string('zone8')->nullable();
            $table->string('zone9')->nullable();
            $table->string('zone10')->nullable();
            $table->string('zone11')->nullable();
            $table->string('zone12')->nullable();
            $table->string('zone13')->nullable();
            $table->string('zone14')->nullable();
            $table->string('zone15')->nullable();
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
        Schema::dropIfExists('hot_runner_temps');
    }
}
