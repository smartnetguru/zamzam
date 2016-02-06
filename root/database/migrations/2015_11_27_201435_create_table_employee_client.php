<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableEmployeeClient extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_client', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->integer('eid')->unsigned();
            $table->integer('cid')->unsigned();
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
        Schema::drop('employee_client');
    }
}
