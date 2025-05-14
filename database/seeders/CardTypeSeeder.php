<?php

namespace Database\Seeders;

use App\Models\CardType;
use App\Models\Game;
use Illuminate\Database\Seeder;

class CardTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pokemonTCG = Game::where('name', 'Pokémon TCG')->first();
        $yugioh = Game::where('name', 'Yu-Gi-Oh!')->first();

         CardType::insert([
            ['name' => 'Pokémon Básico', 'game_id' => $pokemonTCG->id, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Entrenador', 'game_id' => $pokemonTCG->id, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Monstruo', 'game_id' => $yugioh->id, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Mágica', 'game_id' => $yugioh->id, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
