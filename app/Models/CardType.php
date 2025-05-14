<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CardType extends Model
{
    protected $fillable = ['name', 'game_id'];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function cards()
    {
        return $this->hasMany(Card::class);
    }
}