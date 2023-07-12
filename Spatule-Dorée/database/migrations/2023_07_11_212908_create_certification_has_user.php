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
        Schema::create('certification_has_user', function (Blueprint $table) {
            //$table->id();
            $table->datetime('date_obteined');
            $table->string('is_available');
            $table->timestamps();

            $table->unsignedBigInteger('certification_id');
            $table->foreign('certification_id')->references('id')->on('certification')->onDelete('cascade');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->primary(['certification_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certification_has_user');
    }
};
