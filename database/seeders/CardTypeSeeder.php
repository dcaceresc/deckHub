<?php

namespace Database\Seeders;

use App\Models\CardType;
use App\Models\Game;
use App\Models\CardTypeGame;
use Illuminate\Database\Seeder;

class CardTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Crear algunos tipos de carta
        $types = [
            'Monstruo',
            'Hechizo',
            'Pokemón Básico',
            'Entrenador',
        ];

        foreach ($types as $typeName) {
            $cardType = CardType::firstOrCreate(['name' => $typeName]);
        }

        // Obtener juegos existentes
        $pokemonTCG = Game::where('name', 'Pokémon TCG')->first();
        $pokemonTCGPocket = Game::where('name', 'Pokémon TCG Pocket')->first();
        $yugioh  = Game::where('name', 'Yu-Gi-Oh!')->first();

        // Asociar tipos con juegos
        $typeGameMap = [
            'Monstruo'  => [$yugioh],
            'Hechizo'   => [$yugioh],
            'Pokemón Básico' => [$pokemonTCG, $pokemonTCGPocket],
            'Entrenador'   => [$pokemonTCG, $pokemonTCGPocket],
        ];

        foreach ($typeGameMap as $typeName => $games) {
            $cardType = CardType::where('name', $typeName)->first();

            foreach ($games as $game) {
                if ($cardType && $game) {
                    CardTypeGame::firstOrCreate([
                        'card_type_id' => $cardType->id,
                        'game_id' => $game->id,
                    ]);
                }
            }
        }
    }
}
