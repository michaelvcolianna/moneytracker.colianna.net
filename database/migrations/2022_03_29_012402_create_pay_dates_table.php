<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pay_dates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pay_period_id');
            $table->date('start');
            $table->date('end');
            $table->unsignedInteger('beginning')->nullable();
            $table->integer('current')->nullable();
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
        Schema::dropIfExists('pay_dates');
    }
};
