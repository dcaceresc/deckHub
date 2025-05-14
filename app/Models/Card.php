<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $fillable = ['game_id', 'name', 'description', 'card_type_id', 'image'];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function cardType()
    {
        return $this->belongsTo(CardType::class);
    }

    public function decks()
    {
        return $this->belongsToMany(Deck::class,'deck_cards')
                    ->withPivot(['zone', 'quantity'])
                    ->withTimestamps();
    }
}
