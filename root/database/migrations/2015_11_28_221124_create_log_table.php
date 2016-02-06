<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->integer('eid')->unsigned();
            $table->integer('bid')->unsigned();
            $table->integer('cid')->unsigned();
            $table->string('action');
            $table->string('e_description');
            $table->string('b_description');
            $table->string('c_description');
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
        Schema::drop('logs');
    }
}
