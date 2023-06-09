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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('address');
            $table->string('postal_code');
            $table->string('city');
            $table->string('country');
            $table->string('phone');
            $table->string('password');
            $table->string('referral_code')->nullable();
            $table->boolean('is_admin')->default(false);
            $table->boolean('is_teacher')->default(false);
            $table->boolean('is_ban')->default(false);
            $table->rememberToken();
            $table->string('api_token')->unique()->nullable()->default(null);
            $table->timestamps();
            $table->integer('coursesValidated')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
