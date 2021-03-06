<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAffectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affections', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('abrev');
            $table->boolean('active')->default(true);
            $table->timestamps();
        });

        Schema::create('affection_patient', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_id')->unsigned();
            $table->integer('affection_id')->unsigned();
            $table->boolean('state')->default(false);

            $table->foreign('patient_id')->references('id')->on('patients');
            $table->foreign('affection_id')->references('id')->on('affections');

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
        Schema::dropIfExists('affections');
    }
}
