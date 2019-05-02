<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->increments('id');
            $table->string('filename');
            
            $table->unsignedInteger('track_id');
            $table->foreign('track_id')->references('id')->on('track');

            $table->unsignedInteger('created_id');
            $table->foreign('created_id')->references('id')->on('users');
            $table->unsignedInteger('modified_id');
            $table->foreign('modified_id')->references('id')->on('users');
            
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
        Schema::dropIfExists('media');
    }
}
