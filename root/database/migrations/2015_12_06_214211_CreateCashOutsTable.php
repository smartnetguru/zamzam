<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCashOutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cash_outs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('voucher');
            $table->string('name');
            $table->date('date');
            $table->string('type');
            $table->integer('amount')->unsigned();
            $table->string('bank');
            $table->string('check');
            $table->date('check_date');
            $table->string('paid_for');
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
        Schema::drop('cash_outs');
    }
}
