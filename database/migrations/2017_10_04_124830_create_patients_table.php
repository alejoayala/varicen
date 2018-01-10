<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('numberhistory',8)->unique();
            $table->string('name');
            $table->string('lastname');
            $table->string('patient');
            $table->integer('typedocument_id')->unsigned();
            $table->string('dni',8)->unique();
            $table->enum('sex',['H','M'])->default('H');
            $table->date('birthdate')->nullable();
            $table->integer('catchment_id')->unsigned();
            $table->integer('ubigeo_id')->unsigned();
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->string('telephone',7)->nullable();
            $table->string('cellphone',9)->nullable();
            $table->string('photo')->default('no-image.png');
            $table->text('observations')->default(null);            
            $table->boolean('active');

            $table->foreign('typedocument_id')->references('id')->on('typedocuments')->onDelete('cascade');
            $table->foreign('catchment_id')->references('id')->on('catchment')->onDelete('cascade');
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
        Schema::dropIfExists('patients');
    }
}
