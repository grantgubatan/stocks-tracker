<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTradeHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trade_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id');
            $table->integer('trade_id')->nullable();
            $table->string('stock');
            $table->string('stock_status');
            $table->string('profit');
            $table->dateTime('buy_date')->nullable();
            $table->dateTime('sell_date')->nullable();
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
        Schema::dropIfExists('trade_histories');
    }
}
