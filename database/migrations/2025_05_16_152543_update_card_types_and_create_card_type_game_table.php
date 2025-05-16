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
        // Quitar la foreign key y la columna game_id de card_types
        Schema::table('card_types', function (Blueprint $table) {
            $table->dropForeign(['game_id']);
            $table->dropColumn('game_id');
        });

        // Crear tabla pivote card_type_game
        Schema::create('card_type_game', function (Blueprint $table) {
            $table->id();
            $table->foreignId('card_type_id')->constrained()->onDelete('cascade');
            $table->foreignId('game_id')->constrained()->onDelete('cascade');
            $table->timestamps();

            $table->unique(['card_type_id', 'game_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Volver a agregar game_id en card_types
        Schema::table('card_types', function (Blueprint $table) {
            $table->foreignId('game_id')->constrained()->onDelete('cascade');
        });

        Schema::dropIfExists('card_type_game');
    }
};
