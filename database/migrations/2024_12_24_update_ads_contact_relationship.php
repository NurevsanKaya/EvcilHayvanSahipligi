<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Önce mevcut foreign key'i kaldır
        Schema::table('contact', function (Blueprint $table) {
            $table->dropForeign('contact_information_ad_id_foreign');
            $table->dropColumn('ad_id');
        });

        // Ads tablosuna contact_id ekle
        Schema::table('ads', function (Blueprint $table) {
            $table->foreignId('contact_id')->constrained('contact')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        // Geri alma işlemi için
        Schema::table('ads', function (Blueprint $table) {
            $table->dropForeign(['contact_id']);
            $table->dropColumn('contact_id');
        });

        Schema::table('contact', function (Blueprint $table) {
            $table->foreignId('ad_id')->constrained('ads')->onDelete('cascade')->onUpdate('cascade');
        });
    }
}; 