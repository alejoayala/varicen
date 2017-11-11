<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicalshiftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicalshifts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employee_id')->unsigned();
            $table->enum('day',[1,2,3,4,5,6,7])->default(1);
            $table->integer('hourini1_id')->unsigned();
            $table->integer('hourfin1_id')->unsigned();
            $table->integer('hourini2_id')->unsigned();
            $table->integer('hourfin2_id')->unsigned();
            $table->boolean('active');

            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
            $table->foreign('hourini1_id')->references('id')->on('hours')->onDelete('cascade');
            $table->foreign('hourfin1_id')->references('id')->on('hours')->onDelete('cascade');
            $table->foreign('hourini2_id')->references('id')->on('hours')->onDelete('cascade');
            $table->foreign('hourfin2_id')->references('id')->on('hours')->onDelete('cascade');

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
        Schema::dropIfExists('medicalshifts');
    }
}
