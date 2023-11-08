<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClosedCavsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('closed_cavs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('cav_num');
            $table->string('cav');
            $table->unsignedBigInteger('action_id');
            $table->foreign('action_id')->references('id')->on('tool_actions')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('closed_cavs');
    }
}
