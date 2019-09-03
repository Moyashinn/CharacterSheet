<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkillMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skill_masters', function (Blueprint $table) {
            $table->bigInteger('skill_type_id')->unsigned();
            $table->foreign('skill_type_id')->references('skill_type_id')->on('skill_type_masters');
            $table->bigIncrements('skillid');
            $table->string('skill_name');
            $table->string('skill_value');
            $table->boolean('skill_costom_flg');
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
        Schema::dropIfExists('skill_masters');
    }
}
