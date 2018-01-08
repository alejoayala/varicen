<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBellsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bells', function (Blueprint $table) {
            $table->increments('id');
            $table->date('dateini');
            $table->date('datefin');
            $table->integer('hourini1_id')->unsigned();
            $table->integer('hourfin1_id')->unsigned();
            $table->integer('hourini2_id')->unsigned();
            $table->integer('hourfin2_id')->unsigned();
            $table->integer('ubigeo_id')->unsigned();
            $table->text('description');
            $table->integer('user_id')->unsigned();
            $table->boolean('active');

            $table->foreign('hourini1_id')->references('id')->on('hours')->onDelete('cascade');
            $table->foreign('hourfin1_id')->references('id')->on('hours')->onDelete('cascade');
            $table->foreign('hourini2_id')->references('id')->on('hours')->onDelete('cascade');
            $table->foreign('hourfin2_id')->references('id')->on('hours')->onDelete('cascade');
            $table->foreign('ubigeo_id')->references('id')->on('ubigeos')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('bells');
    }
}
