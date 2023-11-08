<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBNSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('b_n_s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('part_id');
            $table->foreign('part_id')->references('id')->on('part_numbers')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('machine_id');
            $table->foreign('machine_id')->references('id')->on('machines')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('cyl_temp_id');
            $table->foreign('cyl_temp_id')->references('id')->on('cyl_temps')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('hot_runner_id');
            $table->foreign('hot_runner_id')->references('id')->on('hot_runner_temps')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('mould_temp_id');
            $table->foreign('mould_temp_id')->references('id')->on('mould_temps')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('injection_id');
            $table->foreign('injection_id')->references('id')->on('injections')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('holding_id');
            $table->foreign('holding_id')->references('id')->on('holdings')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('dosage_id');
            $table->foreign('dosage_id')->references('id')->on('dosages')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('mould_id');
            $table->foreign('mould_id')->references('id')->on('moulds')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('ejector_id');
            $table->foreign('ejector_id')->references('id')->on('ejectors')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('monitoring_id');
            $table->foreign('monitoring_id')->references('id')->on('monitorings')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('core_id');
            $table->foreign('core_id')->references('id')->on('cores')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('short_stroke_id');
            $table->foreign('short_stroke_id')->references('id')->on('short_strokes')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->text('comment')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('b_n_s');
    }
}
