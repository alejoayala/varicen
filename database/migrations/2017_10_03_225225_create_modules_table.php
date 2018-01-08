<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modules', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',100)->unique();
            $table->integer('idparent');
            $table->enum('type',['module','menu','option']);
            $table->string('icono');
            $table->string('name_router',100)->unique();
            $table->string('name_template',100)->unique();
            $table->boolean('menu_internal')->default(true);
            $table->integer('orden')->default(1);
            $table->integer('bloque')->default(1);
            $table->boolean('active');
            $table->timestamps();
        });

        Schema::create('profile_module', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('profile_id')->unsigned();
            $table->integer('module_id')->unsigned();
            $table->boolean('state')->default(false);            

            $table->foreign('profile_id')->references('id')->on('profiles');
            $table->foreign('module_id')->references('id')->on('modules');

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
        Schema::dropIfExists('modules');
    }
}
