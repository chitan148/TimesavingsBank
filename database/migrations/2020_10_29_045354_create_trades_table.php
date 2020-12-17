<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trades', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('user_detail_id')->unsigned();
            $table->bigInteger('trading_time')->unsigned();
            $table->bigInteger('time_save_now')->unsigned();
            $table->bigInteger('type')->unsigned();
            $table->string('comment', 191);
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
        Schema::dropIfExists('trades');
    }
}
