<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rent_bills', function (Blueprint $table) {
            $table->id();
            $table->integer('roomid');
            $table->float('elec_price');
            $table->float('elec_rate');
            $table->float('pumb_price');
            $table->float('pumb_rate');
            $table->float('rent_price');
            $table->float('total');
            $table->integer('status');
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
        Schema::dropIfExists('rent_bills');
    }
}
