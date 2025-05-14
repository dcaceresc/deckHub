<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deck extends Model
{
    protected $fillable = ['user_id', 'game_id', 'name', 'is_public'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function cards()
    {
        return $this->belongsToMany(Card::class,'deck_cards')
                    ->withPivot(['zone', 'quantity'])
                    ->withTimestamps();
    }
}
