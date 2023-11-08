<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartNumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('part_numbers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('machine_id');
            $table->foreign('machine_id')->references('id')->on('machines')->onDelete('cascade')->onUpdate('cascade');
            $table->string('part_no')->unique();
            $table->text('description');
            $table->string('customer');
            $table->string('internal');
            $table->string('cell');
            $table->integer('qty');
            $table->integer('cav');
            $table->integer('cycle_time');
            $table->double('rate_reject');
            $table->integer('rate');
            $table->string('resin_pn1');
            $table->string('resin_pn2')->nullable();
            $table->string('resin_pn3')->nullable();
            $table->string('resin_pn4')->nullable();
            $table->double('shot_wight1');
            $table->double('shot_wight2')->nullable();
            $table->double('shot_wight3')->nullable();
            $table->double('shot_wight4')->nullable();;
            $table->string('color')->nullable();
            $table->string('tool_no');
            $table->string('inj_type')->nullable();
            $table->string('category');
            $table->string('sorting');
            $table->string('consumption_rate')->nullable();
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
        Schema::dropIfExists('part_numbers');
    }
}
