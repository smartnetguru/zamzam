<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cid');
            $table->string('name');
            $table->string('client_phone');
            $table->string('client_email');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('post');
            $table->string('country');
            $table->string('contact_person');
            $table->string('contact_designation');
            $table->string('contact_phone');
            $table->string('contact_email');
            $table->string('bill');
            $table->string('ot');
            $table->date('agreement_from');
            $table->date('agreement_to');
            $table->string('logo');
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
        Schema::drop('Clients');
    }
}
