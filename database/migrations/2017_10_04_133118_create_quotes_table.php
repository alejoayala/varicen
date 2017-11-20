<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotes', function (Blueprint $table) {
            $table->increments('id');
            $table->date('datequotes');
            $table->integer('hourini_id')->unsigned();
            $table->integer('hourfin_id')->unsigned();
            $table->integer('patient_id')->unsigned();
            $table->integer('employee_id')->unsigned();
            $table->integer('statusquo_id')->unsigned();
            $table->integer('medic_id')->unsigned();
            $table->integer('typetreatment_id')->unsigned();
            $table->integer('duracion')->default(0);
            $table->boolean('active');

            $table->foreign('hourini_id')->references('id')->on('hours')->onDelete('cascade');
            $table->foreign('hourfin_id')->references('id')->on('hours')->onDelete('cascade');
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
            $table->foreign('statusquo_id')->references('id')->on('statusquo')->onDelete('cascade');
            $table->foreign('medic_id')->references('id')->on('employees')->onDelete('cascade');
            $table->foreign('typetreatment_id')->references('id')->on('typetreatments')->onDelete('cascade');

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
        Schema::dropIfExists('quotes');
    }
}
