<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMachinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('machines', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('seel_id');
            $table->foreign('seel_id')->references('id')->on('seels')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('area');
            $table->string('serial');
            $table->string('type');
            $table->bigInteger('tonnage');
            $table->string('screw');
            $table->string('robot');
            $table->string('k');
            $table->string('semi_auto');
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
        Schema::dropIfExists('machines');
    }
}
