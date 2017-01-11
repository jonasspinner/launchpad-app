<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('device_activities', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('batch_id')->unsigned();
            $table->foreign('batch_id')
                ->references('id')
                ->on('activity_batches')
                ->onDelete('cascade');

            $table->integer('device_id')->unsigned();
            $table->foreign('device_id')
                ->references('id')
                ->on('devices')
                ->onDelete('cascade');

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
        Schema::drop('device_activities');
    }
}
