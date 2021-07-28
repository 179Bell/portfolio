<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGearTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gears', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('comment');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('maker_id')->unsigned();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('maker_id')->references('id')->on('makers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gear');
    }
}
