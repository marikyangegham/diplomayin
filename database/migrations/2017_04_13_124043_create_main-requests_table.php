<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMainRequestsTable extends Migration
{
    public function up()
    {
        Schema::create('main_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('goods_id');
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
        Schema::drop('main_requests');
    }
}
