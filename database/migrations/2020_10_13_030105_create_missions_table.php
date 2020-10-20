<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('missions', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('user_detail_id')->unsigned();
            $table->string('name', 30);
            $table->bigInteger('time')->unsigned();
            $table->bigInteger('difficulty')->unsigned();
            $table->bigInteger('group')->unsigned();
            $table->timestamps();
            $table->foreign('user_detail_id')->references('id')->on('user_details');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('missions');
    }
}
