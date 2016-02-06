<?php

/**
 * Employee Table
 * Created by smartrahat
 * Date: 2015.09.04 Time:4:26AM
 */

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('eid');
            $table->integer('bid')->unsigned();
            $table->integer('cid')->unsigned();
            $table->string('name');
            $table->string('designation');
            $table->date('dob');
            $table->date('joining');
            $table->integer('basic')->unsigned();
            $table->integer('ot_rate')->unsigned();
            $table->string('license');
            $table->date('license_expire');
            $table->string('phone');
            $table->string('email');
            $table->string('present');
            $table->string('pre_city');
            $table->string('pre_state');
            $table->string('pre_post');
            $table->string('pre_country');
            $table->string('permanent');
            $table->string('per_city');
            $table->string('per_state');
            $table->string('per_post');
            $table->string('per_country');
            $table->string('passport');
            $table->date('passport_expire');
            $table->string('visa');
            $table->date('visa_expire');
            $table->string('reference');
            $table->string('reference_phone');
            $table->string('image');
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
        Schema::drop('employees');
    }
}
