<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehicleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bid');
            $table->string('registration');
            $table->string('vendor');
            $table->date('purchase_date');
            $table->string('brand');
            $table->string('model');
            $table->date('registration_date');
            $table->date('registration_expire');
            $table->string('engine');
            $table->string('chases');
            $table->string('body');
            $table->integer('seat')->unsigned();
            $table->text('remarks')->nullable();
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
        Schema::drop('vehicles');
    }
}
