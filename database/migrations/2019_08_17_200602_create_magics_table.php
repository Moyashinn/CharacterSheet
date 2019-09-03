<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMagicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('magics', function (Blueprint $table) {
            $table->bigInteger('character_id')->unsigned();
            $table->foreign('character_id')->references('character_id')->on('character_lists');
            $table->bigIncrements('magic_id');
            $table->string('magic_name');
            $table->integer('consmption_mp')->unsigned();
            $table->string('magic_info');
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
        Schema::dropIfExists('magics');
    }
}
