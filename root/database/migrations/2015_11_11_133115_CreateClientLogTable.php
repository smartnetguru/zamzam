<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_log', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cid')->unsigned();
            $table->date('date');
            $table->string('driver');
            $table->string('vehicle');
            $table->string('status');
            $table->string('description');
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
        Schema::drop('client_log');
    }
}
