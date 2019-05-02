<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('features', function (Blueprint $table) {
            $table->increments('id');
            $table->string('text');
            $table->string('url');
            
            $table->unsignedInteger('type_id');
            $table->foreign('type_id')->references('id')->on('type');
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
        Schema::dropIfExists('features');
    }
}
