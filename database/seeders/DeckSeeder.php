<?php

namespace Database\Seeders;

use App\Models\Deck;
use App\Models\Game;
use Illuminate\Database\Seeder;

class DeckSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pokemon = Game::where('name', 'Pokémon TCG')->first();

        Deck::create([
            'user_id' => 1, // Asegúrate de tener un usuario con ID 1
            'game_id' => $pokemon->id,
            'name' => 'Deck Pikachu',
            'is_public' => true,
        ]);
    }
}
