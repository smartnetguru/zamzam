<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCashInTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cash_ins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('voucher')->unique();
            $table->date('date');
            $table->string('client');
            $table->string('type');
            $table->integer('amount')->unsigned();
            $table->string('bank');
            $table->string('cheque');
            $table->date('chequeDate');
            $table->text('for');
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
        Schema::drop('cash_ins');
    }
}
