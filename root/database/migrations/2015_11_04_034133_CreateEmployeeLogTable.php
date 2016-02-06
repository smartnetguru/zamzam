<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_log', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('eid');
            $table->date('date');
            $table->string('vehicle');
            $table->string('client');
            $table->string('status');
            $table->string('action');
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
        Schema::drop('employee_log');
    }
}
