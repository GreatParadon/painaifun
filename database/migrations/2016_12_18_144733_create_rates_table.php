<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Migration auto-generated by Sequel Pro Laravel Export
 * @see https://github.com/cviebrock/sequel-pro-laravel-export
 */
class CreateRateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rates', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('room_id');
            $table->date('fromdate')->nullable();
            $table->date('todate')->nullable();
            $table->integer('first')->nullable();
            $table->integer('second')->nullable();
            $table->integer('holiday')->nullable();
            $table->tinyInteger('breakfast')->nullable();
            $table->integer('extrabed')->nullable();
            $table->boolean('active')->nullable();
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
        Schema::dropIfExists('rates');
    }
}