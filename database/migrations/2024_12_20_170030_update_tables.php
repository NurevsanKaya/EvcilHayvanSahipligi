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
        Schema::table('ads', function (Blueprint $table) {
            // Yeni sütunu burada tanımla
            $table->string('image_url')->nullable(); // Örneğin: 'new_column' adında bir sütun ekleniyor
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ads', function (Blueprint $table) {
            // Sütunu geri almak için
            $table->dropColumn('image_url');
        });
    }
};
