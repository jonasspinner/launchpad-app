<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devices', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name')->default('');
            $table->macAddress('mac_address')->nullable();
            $table->string('hash', 64)->unique();

            $table->integer('owner_id')->unsigned()-nullable();
            $table->foreign('owner_id')
                ->references('id')
                ->on('slack_users')
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
        Schema::drop('devices');
    }
}
