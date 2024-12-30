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
            $table->dropColumn('shipping_possible'); // Sütunun adını yazın
        });
        Schema::table('addresses', function (Blueprint $table) {
            $table->string('street')->nullable()->change(); // street sütununu nullable yapıyoruz
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ads', function (Blueprint $table) {
            $table->string('shipping_possible')->nullable();
        });
        Schema::table('addresses', function (Blueprint $table) {
            $table->string('street')->nullable(false)->change(); // nullable özelliğini kaldırıyoruz
        });
    }
};
