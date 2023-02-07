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
        Schema::create('payees', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->unsignedInteger('schedule_amount')->nullable();
            $table->unsignedTinyInteger('earliest_day')->nullable();
            $table->unsignedTinyInteger('latest_day')->nullable();
            $table->boolean('auto_schedule')->default(false);
            $table->json('schedule_months')->default(
                json_encode(array_fill_keys(range(1, 12), true))
            );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payees');
    }
};
