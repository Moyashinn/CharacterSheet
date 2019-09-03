<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCharacterItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('character_items', function (Blueprint $table) {
            $table->bigInteger('character_id')->unsigned();
            $table->foreign('character_id')->references('character_id')->on('character_lists');
            $table->bigIncrements('item_id');
            $table->string('name');
            $table->integer('item_unitprice')->unsigned();
            $table->integer('item_quantity')->unsigned();
            $table->integer('item_price')->unsigned();
            $table->string('item_info', 200);
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
        Schema::dropIfExists('character_items');
    }
}
