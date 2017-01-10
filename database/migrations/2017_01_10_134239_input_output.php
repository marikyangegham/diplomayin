<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InputOutput extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('input_output', function (Blueprint $table) {
            $table->increments('id');
            $table->string('input_goods_id');
            $table->integer('quantity_input');
            $table->string('output_goods_id');
            $table->integer('quantity_output');
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
        Schema::drop('input_output');
    }
}
