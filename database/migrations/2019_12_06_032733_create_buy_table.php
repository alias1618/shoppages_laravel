<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buy', function (Blueprint $table) {
            $table->increments('buy_id');
            $table->time('buy_date');
            $table->string('buy_name',30);
            $table->string('buy_add',60);
            $table->string('buy_phone',15);
            $table->integer('buy_money')->length(10);
            $table->tinyInteger('ship_status_id')->length(10)->default(1);
            $table->integer('user_id')->length(10);
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
        Schema::dropIfExists('buy');
    }
}
