<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_addresses', function (Blueprint $table) {
            $table->id();
            $table->string('type')->length(20);
            $table->string('address1')->length(255);
            $table->string('address2')->length(255);
            $table->string('city')->length(255);
            $table->string('state')->length(45)->nullable();
            $table->string('zipcode')->length(45);
            $table->string('country_code')->length(10);
            $table->foreignId('customer_id')->references('id')->on('customers');
            $table->timestamps();
            $table->foreign('country_code')->references('code')->on('countries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_addresses');
    }
};
