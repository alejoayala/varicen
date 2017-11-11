<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBelldetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('belldetails', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bell_id')->unsigned();
            $table->integer('employee_id')->unsigned();
            $table->boolean('active');

            $table->foreign('bell_id')->references('id')->on('bells')->onDelete('cascade');
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');

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
        Schema::dropIfExists('belldetails');
    }
}
