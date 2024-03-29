<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarouselTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carousels', function (Blueprint $table) {
            $table->id();
            $table->integer('status');
            $table->string('title');
            $table->text('text');
            $table->string('path_root')->nullable();
            $table->string('path_tag')->nullable();
            $table->string('file_name')->nullable();
            $table->string('file_ext')->nullable();
            $table->string('image');
            $table->string('thumb');
            //imagen auxiliar solo disponible en modo full slider 
            //para dispositivos
            //$table->string('aux_title');
            //$table->text('aux_text');
            $table->string('aux_path_tag')->nullable();
            $table->string('aux_file_name')->nullable();
            $table->string('aux_file_ext')->nullable();
            $table->string('aux_image')->nullable();
            $table->string('aux_thumb')->nullable();
            $table->integer('position');
            $table->integer('user_id');
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
        Schema::dropIfExists('carousels');
    }
}
