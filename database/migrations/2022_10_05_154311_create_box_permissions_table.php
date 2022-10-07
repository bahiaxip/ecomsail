<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoxPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('box_permissions', function (Blueprint $table) {
            $table->id();
            $table->integer('status');
            $table->string('name');
            $table->text('icon_awesome')->nullable();
            $table->string('icon')->nullable();
            $table->string('icon_classlist')->nullable();
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
        Schema::dropIfExists('box_permissions');
    }
}
