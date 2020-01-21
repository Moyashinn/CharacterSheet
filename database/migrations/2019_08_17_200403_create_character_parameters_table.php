<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCharacterParametersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('character_parameters', function (Blueprint $table) {
            
            /*$table->integer('str')->unsigned();
            $table->integer('con')->unsigned();
            $table->integer('siz')->unsigned();
            $table->integer('dex')->unsigned();
            $table->integer('app')->unsigned();
            $table->integer('int')->unsigned();
            $table->integer('pow')->unsigned();
            $table->integer('edu')->unsigned();
            $table->integer('hp')->unsigned();
            $table->integer('mp')->unsigned();
            $table->integer('san')->unsigned();*/
			$table->bigInteger('character_id')->unsigned();
			$table->foreign('character_id')->references('character_id')->on('character_lists');
			$table->json('parameters')->nullable();
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
        Schema::dropIfExists('character_parameters');
    }
}
