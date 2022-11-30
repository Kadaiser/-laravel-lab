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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('height')->unsigned();
            $table->integer('width')->unsigned();
            $table->integer('length')->unsigned();
            $table->integer('volume')->unsigned();
            $table->string("floor");
            $table->string("location")->nullable();
            $table->string("type")->default('App\\\\Models\\\\Rooms\\\\GenericRoom');
            $table->boolean("disabled")->default(false);;
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
        Schema::dropIfExists('rooms');
    }
};
