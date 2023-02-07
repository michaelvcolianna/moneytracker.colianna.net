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
        Schema::create('paydays', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('start_date');
            $table->integer('end_date');
            $table->unsignedInteger('beginning_amount');
            $table->integer('current_amount');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paydays');
    }
};
