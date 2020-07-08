<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerFormTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_form', function (Blueprint $table) {
            $table->increments('customer_form_id');
            $table->string('customer_form_question',500);
            $table->integer('user_id')->length(10);
            $table->tinyInteger('role_id')->length(1)->default(1);
            $table->dateTime('customer_form_time');
            $table->string('customer_form_answer',500);
            $table->integer('customer_form_answer_id')->length(10);
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
        Schema::dropIfExists('customer_form');
    }
}
