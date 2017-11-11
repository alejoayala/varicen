<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
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
            $table->string('name');
            $table->string('lastname');
            $table->integer('typedocument_id')->unsigned();
            $table->string('dni',8)->unique();
            $table->integer('charge_id')->unsigned();
            $table->integer('profile_id')->unsigned();
            $table->date('birthdate');
            $table->string('password');
            $table->enum('sex',['H','M'])->default('H');
            $table->string('photo');
            $table->boolean('enabled');
            $table->boolean('access');
            $table->integer('ubigeo_id')->unsigned();
            $table->string('address');
            $table->string('email');
            $table->string('telephone',7);
            $table->string('cellphone',9);
            $table->boolean('active');

            $table->foreign('typedocument_id')->references('id')->on('typedocuments')->onDelete('cascade');
            $table->foreign('charge_id')->references('id')->on('charges')->onDelete('cascade');
            $table->foreign('profile_id')->references('id')->on('profiles')->onDelete('cascade');
            $table->foreign('ubigeo_id')->references('id')->on('ubigeos')->onDelete('cascade');

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
        Schema::dropIfExists('employees');
    }
}
