<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('track', function(Blueprint $table){
            $table->increments('id');
            $table->string('text');
            $table->text('description');
            $table->text('directions');
            $table->decimal('gps_start_x', 13, 10);
            $table->decimal('gps_start_y', 13, 10);
            $table->decimal('gps_finish_x', 13, 10);
            $table->decimal('gps_finish_y', 13, 10);

            $table->unsignedInteger('category_id');
            $table->foreign('category_id')->references('id')->on('category');

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
        Schema::dropIfExists('track');
    }
}
