<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CardTypeGame extends Model
{
    use HasFactory;

    protected $table = 'card_type_game';

    protected $fillable = [
        'card_type_id',
        'game_id',
    ];

}
