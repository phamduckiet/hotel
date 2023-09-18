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
        Schema::create('room_types', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // 255
            $table->integer('max_adults');
            $table->integer('max_children');
            $table->integer('hourly_price');
            $table->integer('daily_price');
            $table->integer('nightly_price');
            $table->integer('monthly_price');
            $table->text('description')->nullable();
            $table->timestamps(); // created_at/updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_types');
    }
};
