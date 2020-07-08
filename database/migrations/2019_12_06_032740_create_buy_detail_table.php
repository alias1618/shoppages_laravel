<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuyDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buy_detail', function (Blueprint $table) {
            $table->increments('buy_detail_id');
            $table->integer('buy_id')->length(10);
            $table->integer('product_price')->length(10);
            $table->string('Product_name',30);
            $table->integer('buy_number')->length(10);
            $table->integer('product_id')->length(10);

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
        Schema::dropIfExists('buy_detail');
    }
}
