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
        Schema::create('formations', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignid('event_id')->constrained('events');
            $table->string('formation_titre');
            $table->text('formation_description');
            $table->string('chapitre1_titre');
            $table->text('chapitre1_cours');
            $table->string('chapitre2_titre');
            $table->text('chapitre2_cours');
            $table->string('question1');
            $table->string('reponse1q1');
            $table->boolean('reponse1q1_correcte')->default(false);
            $table->string('reponse2q1');
            $table->boolean('reponse2q1_correcte')->default(false);
            $table->string('reponse3q1');
            $table->boolean('reponse3q1_correcte')->default(false);
            $table->string('reponse4q1');
            $table->boolean('reponse4q1_correcte')->default(false);
            $table->string('question2');
            $table->string('reponse1q2');
            $table->boolean('reponse1q2_correcte')->default(false);
            $table->string('reponse2q2');
            $table->boolean('reponse2q2_correcte')->default(false);
            $table->string('reponse3q2');
            $table->boolean('reponse3q2_correcte')->default(false);
            $table->string('reponse4q2');
            $table->boolean('reponse4q2_correcte')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formations');
    }
};
