<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ship', function (Blueprint $table) {
            $table->increments('ship_id');
            $table->tinyInteger('ship_status_id')->length(1)->default(1);
            $table->integer('product_id')->length(10);
            $table->integer('Ship_number')->length(10);
            $table->integer('buy_id')->length(10);
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
        Schema::dropIfExists('ship');
    }
}
