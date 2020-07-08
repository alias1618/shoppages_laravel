<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('product_id');
            $table->string('product_name',30);
            $table->integer('product_number')->length(10)->unsigned();
            $table->integer('product_price')->length(10)->unsigned();
            $table->string('product_describe',300);
            $table->tinyInteger('product_status_id')->length(1)->unsigned();
            $table->integer('product_category_id')->length(10)->unsigned();
            $table->integer('product_buy_price')->length(10)->unsigned();
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
        Schema::dropIfExists('product');
    }
}
