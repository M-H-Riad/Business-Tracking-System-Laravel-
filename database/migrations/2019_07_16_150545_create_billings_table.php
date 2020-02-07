<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('date');
            $table->string('agency');
            $table->string('client');
            $table->integer('billNo');
            $table->string('type');
            $table->integer('length');
            $table->double('rate', 8, 3);
            $table->integer('billAmount');
            $table->integer('payment');
            $table->integer('due');
            $table->string('note');
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
        Schema::dropIfExists('billings');
    }
}
