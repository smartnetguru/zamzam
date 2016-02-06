<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMyVendorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_vendors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('vid');
            $table->string('name');
            $table->string('type');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('post');
            $table->string('country');
            $table->integer('phone');
            $table->string('email');
            $table->integer('fax');
            $table->string('account');
            $table->string('contact_person');
            $table->string('designation');
            $table->string('contact_phone');
            $table->string('contact_email');
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
        Schema::drop('my_vendors');
    }
}
