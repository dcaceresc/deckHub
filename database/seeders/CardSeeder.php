<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Card;
use App\Models\Game;
use App\Models\CardType;

class CardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pokemon = Game::where('name', 'Pokémon TCG')->first();
        $yugioh = Game::where('name', 'Yu-Gi-Oh!')->first();

        $pokeType = CardType::where('name', 'Pokémon Básico')->first();
        $yugiType = CardType::where('name', 'Monstruo')->first();

        Card::create([
            'name' => 'Pikachu',
            'game_id' => $pokemon->id,
            'description' => 'Un Pokémon eléctrico.',
            'card_type_id' => $pokeType->id,
        ]);

        Card::create([
            'name' => 'Blue-Eyes White Dragon',
            'game_id' => $yugioh->id,
            'description' => 'Un dragón legendario.',
            'card_type_id' => $yugiType->id,
        ]);
    }
}
