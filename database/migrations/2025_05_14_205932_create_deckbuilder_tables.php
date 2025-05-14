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
         // Tabla: Juegos (Pokémon, Yu-Gi-Oh!, etc.)
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
        });

        // Tabla: Tipos de cartas
        Schema::create('card_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('game_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });

        // Tabla: Cartas
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('game_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->text('description')->nullable();
            $table->foreignId('card_type_id')->nullable()->constrained()->onDelete('set null');
            $table->string('image')->nullable();
            $table->timestamps();
        });

        // Tabla: Mazos
        Schema::create('decks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('game_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->boolean('is_public')->default(false);
            $table->timestamps();
        });

        // Tabla: Relación muchos a muchos entre mazos y cartas
        Schema::create('deck_cards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('deck_id')->constrained()->onDelete('cascade');
            $table->foreignId('card_id')->constrained()->onDelete('cascade');
            $table->enum('zone', ['main', 'side'])->default('main');
            $table->unsignedInteger('quantity')->default(1);
            $table->timestamps();

            $table->unique(['deck_id', 'card_id', 'zone']); // evita duplicados en misma zona
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deck_cards');
        Schema::dropIfExists('decks');
        Schema::dropIfExists('cards');
        Schema::dropIfExists('card_types');
        Schema::dropIfExists('games');
    }
};
