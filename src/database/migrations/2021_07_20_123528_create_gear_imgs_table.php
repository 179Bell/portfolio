<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGearImgsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gear_imgs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('gear_id')->unsigned();
            $table->string('img_path');
            $table->timestamps();
            $table->foreign('gear_id')->references('id')->on('gears')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gear_imgs');
    }
}
