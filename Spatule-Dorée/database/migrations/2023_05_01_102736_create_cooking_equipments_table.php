<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    //Cooking equipments = Equipements de cuisine (shop)

    public function up(): void
    {
        Schema::create('cooking_equipment', function (Blueprint $table) {
            $table->id();
            $table->string('category');
            $table->string('name');
            $table->string('description');
            $table->integer('available_quantity');
            $table->integer('price');
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cooking_equipment');
    }
};
