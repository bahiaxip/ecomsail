<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('lastname');            
            $table->integer('zone');
            $table->integer('location_id');
            $table->integer('province_id')->nullable();
            $table->integer('city_id')->nullable();
            $table->string('address_home');
            $table->string('apartment')->nullable();
            $table->string('cp');
            $table->string('town')->nullable();
            $table->string('phone');
            $table->string('email');
            $table->string('business')->nullable();
            $table->string('title')->nullable();
            $table->integer('user_id');
            $table->integer('default');
            $table->string('nif')->nullable();
            $table->string('ref')->nullable();
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
        Schema::dropIfExists('addresses');
    }
}
