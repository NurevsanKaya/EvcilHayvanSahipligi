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
        Schema::table('favorite_ads', function (Blueprint $table) {

            $table->dropColumn('added_at'); // Sütunun adını yazın

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('favorite_ads', function (Blueprint $table) {
            $table->timestamp('added_at');
        });
    }
};
