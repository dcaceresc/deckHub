<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Deck;
use App\Models\Card;

class DeckCardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $deck = Deck::where('name', 'Deck Pikachu')->first();
        $pikachu = Card::where('name', 'Pikachu')->first();

        $deck->cards()->attach($pikachu->id, [
            'zone' => 'main',
            'quantity' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
