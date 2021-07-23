<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGearImgTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gear_img', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('gear_id')->unsigned();
            $table->string('img_path')->nullable();
            $table->timestamps();
            $table->foreign('gear_id')->references('id')->on('gear');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gear_img');
    }
}
