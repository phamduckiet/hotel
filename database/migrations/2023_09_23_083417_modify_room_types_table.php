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
        Schema::table('room_types', function (Blueprint $table) {
            $table->dropColumn('hourly_price');
            $table->dropColumn('daily_price');
            $table->dropColumn('nightly_price');
            $table->dropColumn('monthly_price');
            $table->integer('price')->after('max_children');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('room_types', function (Blueprint $table) {
            $table->integer('hourly_price');
            $table->integer('daily_price');
            $table->integer('nightly_price');
            $table->integer('monthly_price');
            $table->dropColumn('price');
        });
    }
};
