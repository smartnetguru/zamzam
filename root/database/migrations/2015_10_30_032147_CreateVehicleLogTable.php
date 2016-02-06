<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehicleLogTable extends Migration
{
    /**
     * Run the migrations.
     * Created by smartrahat Date: 30.10.2015 Time: 09:27AM
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_log', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bid')->unsigned();
            $table->date('date');
            $table->string('driver');
            $table->string('client');
            $table->string('action');
            $table->string('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * Created by smartrahat Date: 30.10.2015 Time: 09:27AM
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('vehicle_log');
    }
}
