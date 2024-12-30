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
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('districts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('city_id')->constrained('cities')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('street');
            $table->string('postal_code');
            $table->foreignId('district_id')->constrained('districts')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
        Schema::create('statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('pet_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('pet_breeds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('type_id')->constrained('pet_types')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('health_statuses', function (Blueprint $table) {
            $table->id();
            $table->boolean('vaccination');
            $table->boolean('internal_parasite');
            $table->boolean('external_parasite');
            $table->text('health_description');
            $table->timestamps();
        });

        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('breed_id')->constrained('pet_breeds')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('age');
            $table->string('gender');
            $table->foreignId('health_status_id')->constrained('health_statuses')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });



        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade'); // User ile ilişki
            $table->foreignId('pet_id')->constrained('pets')->onDelete('cascade')->onUpdate('cascade');   // Pet ile ilişki
            $table->string('title');  // İlan başlığı
            $table->text('description');  // Detay
            $table->foreignId('status_id')->constrained('statuses')->onDelete('cascade')->onUpdate('cascade');  // Durum (Sahiplendirildi veya Sahiplendirilmedi)
            $table->foreignId('address_id')->constrained('addresses')->onDelete('cascade')->onUpdate('cascade');  // Address ile ilişki
            $table->boolean('shipping_possible');  // Şehir dışına gönderim
            $table->timestamps();  // created_at, updated_at
        });

        Schema::create('contact_information', function (Blueprint $table) {
            $table->id();

            $table->foreignId('ad_id')->constrained('ads')->onDelete('cascade')->onUpdate('cascade');

            $table->string('phone_number');
            $table->string('email');
            $table->timestamps();
        });
        Schema::create('training_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pet_id')->constrained('pets')->onDelete('cascade')->onUpdate('cascade');
            $table->string('training_type');
            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();
            $table->string('trainer_name')->nullable();
            $table->text('comments')->nullable();
        });
        Schema::create('favorite_ads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('ad_id')->constrained('ads')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamp('added_at');
            $table->timestamps();
        });
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('name');
            $table->string('email');
            $table->string('subject');
            $table->text('content');
            $table->timestamps();
        });



    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cities');
        Schema::dropIfExists('districts');
        Schema::dropIfExists('addresses');
        Schema::dropIfExists('statuses');
        Schema::dropIfExists('pet_types');
        Schema::dropIfExists('pet_breeds');
        Schema::dropIfExists('health_statuses');
        Schema::dropIfExists('pets');
        Schema::dropIfExists('ads');
        Schema::dropIfExists('contact_information');
        Schema::dropIfExists('training_infos');
        Schema::dropIfExists('favorite_ads');
        Schema::dropIfExists('messages');




    }
};
