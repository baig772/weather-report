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
        Schema::create('user_weather', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->string('country');
            $table->decimal('temperature_celsius', 5);
            $table->decimal('temperature_fahrenheit', 5);
            $table->decimal('wind_mph', 5);
            $table->decimal('wind_kph', 5);
            $table->decimal('humidity', 5);
            $table->decimal('cloud',5);
            $table->decimal('feelslike_celsius', 5);
            $table->decimal('feelslike_fahrenheit', 5);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_weather');
    }
};
