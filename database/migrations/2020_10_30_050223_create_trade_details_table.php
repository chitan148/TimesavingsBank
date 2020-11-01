<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTradeDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trade_details', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('trade_id')->unsigned();
            $table->bigInteger('mission_id')->unsigned();
            $table->bigInteger('mission_count')->unsigned();
            $table->timestamps();
            $table->foreign('trade_id')->references('id')->on('trades');
            $table->foreign('mission_id')->references('id')->on('missions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trade_details');
    }
}
