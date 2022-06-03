<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('status');
            $table->integer('zone');
            $table->integer('prefix_phone')->nullable();
            $table->string('coin')->nullable();
            $table->string('path_tag')->nullable();
            $table->string('icon')->nullable();
            $table->string('icon_code')->nullable();
            $table->string('isocode_alpha2')->nullable();
            $table->integer('isocode_num')->nullable();
            //precio de entrega estimado por defecto
            $table->decimal('price_default')->nullable();
            //días de entrega estimada por defecto
            $table->integer('default_delivery')->nullable();            
            $table->string('type')->nullable();            
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
        Schema::dropIfExists('locations');
    }
}
