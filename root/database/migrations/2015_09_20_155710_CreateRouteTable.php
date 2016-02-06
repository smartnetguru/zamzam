<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRouteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Routes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('client');
            $table->string('vehicle');
            $table->string('employee');
            $table->date('date');
            $table->integer('hour')->unsigned();
            $table->integer('ot')->unsigned();
            $table->string('remarks');
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
        Schema::drop('Routes');
    }
}
