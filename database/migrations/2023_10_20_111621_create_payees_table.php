<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedInteger('schedule_amount')->nullable();
            $table->unsignedTinyInteger('earliest_day')->nullable();
            $table->unsignedTinyInteger('latest_day')->nullable();
            $table->boolean('auto_schedule')->default(false);
            $table->json('schedule_months');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payees');
    }
};
