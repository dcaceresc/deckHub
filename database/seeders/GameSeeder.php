<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Game;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Game::insert([
            ['name' => 'Pokémon TCG', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Pokémon TCG Pocket', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Yu-Gi-Oh!', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Magic: The Gathering', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Hearthstone', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Legends of Runeterra', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Digimon Card Game', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Flesh and Blood TCG', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
