<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = ['name'];

    public function cardTypes()
    {
        return $this->hasMany(CardType::class);
    }

    public function cards()
    {
        return $this->hasMany(Card::class);
    }

    public function decks()
    {
        return $this->hasMany(Deck::class);
    }
}