<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReturnedGoodsTable extends Migration
{
    public function up()
    {
        Schema::create('returned_goods', function (Blueprint $table) {
            $table->increments('id');
            $table->string('goods_id');
            $table->string('user_id');
            $table->integer('quantity');
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
        Schema::drop('returned_goods');
    }
}
