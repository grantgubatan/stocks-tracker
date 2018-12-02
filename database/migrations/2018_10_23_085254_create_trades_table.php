<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->integer('client_id');
            $table->string('company');
            $table->string('ticker');
            $table->integer('volume');
            $table->decimal('initial_stock_price', 10, 2);
            $table->decimal('initial_investment_value', 10, 2);
            $table->decimal('sold_value', 10, 2)->nullable();
            $table->decimal('profit', 10, 2)->nullable();
            $table->decimal('gain_percentage', 10, 2)->nullable();
            $table->dateTime('buy_date')->nullable();
            $table->dateTime('sell_date')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('trades');
    }
}
