<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCharacterListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('character_lists', function (Blueprint $table) {
            $table->bigInteger('id')->unsigned();
            $table->foreign('id')->references('id')->on('users');
            $table->bigIncrements('character_id');
            $table->string('character_tag');
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
        Schema::dropIfExists('character_lists');
    }
}
