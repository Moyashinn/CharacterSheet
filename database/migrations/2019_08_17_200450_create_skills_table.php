<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->bigInteger('character_id')->unsigned();
            $table->bigInteger('skill_id')->unsigned();
            $table->integer('add_jsp')->unsigned();
            $table->integer('add_hsp')->unsigned();
            $table->integer('add_gsp')->unsigned();
            $table->integer('add_asp')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('skills');
    }
}
