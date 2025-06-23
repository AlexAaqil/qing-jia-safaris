<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('tour_itineraries', function (Blueprint $table) {
            // Drop the existing unique constraint on title if it exists
            $table->dropUnique('tour_itineraries_title_unique');

            // Add a new composite unique index
            $table->unique(['tour_id', 'day_number'], 'tour_day_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tour_itineraries', function (Blueprint $table) {
            $table->dropUnique('tour_day_unique');
            $table->unique('title'); // Revert back to original if needed
        });
    }
};
