<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salaries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('eid');
            $table->enum('type',[0,1,2]);
            $table->string('name');
            $table->string('month');
            $table->date('date');
            $table->string('start');
            $table->string('end');
            $table->string('leaves');
            $table->integer('worked');
            $table->integer('ot_rate');
            $table->integer('ot_hour');
            $table->integer('ot_amount');
            $table->integer('basic');
            $table->integer('basic_amount');
            $table->integer('total');
            $table->integer('paid');
            $table->string('comments');
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
        Schema::drop('salaries');
    }
}
