<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('renter', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('roomid');
            $table->mediumText('firstname');
            $table->mediumText('lastname');
            $table->mediumText('iden_num');
            $table->mediumText('email');
            $table->mediumText('nationality');
            $table->mediumText('verify_code');
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
        Schema::dropIfExists('renter');
    }
}
