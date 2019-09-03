<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCharacterProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('character_profiles', function (Blueprint $table) {
            $table->bigInteger('character_id')->unsigned();
            $table->foreign('character_id')->references('character_id')->on('character_lists');
            $table->string('character_name');
            $table->string('character_age');
            $table->string('character_sex');
            $table->string('character_any_info');
            $table->string('character_pocketmoney');
            $table->string('character_deposit');
            $table->string('character_spirit_obstacle');
            $table->string('character_body_obstacle');
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
        Schema::dropIfExists('character_profiles');
    }
}
