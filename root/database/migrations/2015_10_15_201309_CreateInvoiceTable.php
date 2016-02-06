<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('month');
            $table->string('invoiceNumber');
            $table->string('client');
            $table->date('date');
            $table->string('is_driver');
            $table->string('vehicle');
            $table->string('duty');
            $table->integer('bill');
            $table->integer('ot');
            $table->integer('ot_bill');
            $table->text('comment');
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
        Schema::drop('invoices');
    }
}
