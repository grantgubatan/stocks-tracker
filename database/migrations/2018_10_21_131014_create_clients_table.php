<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->string('fullname');
            $table->string('email');
            $table->string('email2')->nullable();
            $table->string('phone')->nullable();
            $table->string('phone2')->nullable();
            $table->string('country')->nullable();
            $table->string('occupation')->nullable();
            $table->string('leadsource')->nullable();
            $table->string('traded')->nullable();
            $table->decimal('account_balance', 10, 2)->nullable();

            $table->string('account_number')->nullable();
            $table->string('account_type')->nullable();
            $table->string('salutation')->nullable();
            $table->string('address')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('home_number')->nullable();
            $table->string('business_number')->nullable();
            $table->dateTime('dob')->nullable();
            $table->string('pob')->nullable();
            $table->string('mstatus')->nullable();
            $table->string('empstatus')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_address')->nullable();


            $table->string('secondary_salutation')->nullable();
            $table->string('secondary_fullname')->nullable();
            $table->string('secondary_address')->nullable();
            $table->string('secondary_primary_number')->nullable();
            $table->string('secondary_mobile_number')->nullable();
            $table->string('secondary_home_number')->nullable();
            $table->string('secondary_business_number')->nullable();
            $table->string('secondary_dob')->nullable();
            $table->string('secondary_pob')->nullable();
            $table->string('secondary_country')->nullable();
            $table->string('secondary_mstatus')->nullable();
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
        Schema::dropIfExists('clients');
    }
}
