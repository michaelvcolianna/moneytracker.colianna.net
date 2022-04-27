<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

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
            $table->string('name');
            $table->unsignedInteger('amount')->nullable();
            $table->unsignedTinyInteger('start')->nullable();
            $table->unsignedTinyInteger('end')->nullable();
            $table->boolean('auto')->default(false);
            foreach(config('app.months') as $key => $value)
            {
                $table->boolean($key)->default(false);
            }
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
        Schema::dropIfExists('payees');
    }
};
