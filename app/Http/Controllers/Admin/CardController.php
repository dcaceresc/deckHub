<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\CardType;
use App\Models\Game;

class CardController extends Controller
{
    public function index()
    {
        $cards = Card::all();

        return view('admin.cards.index', compact('cards'));
    }

    public function create()
    {
        $games = Game::all();
        $cardTypes = CardType::all();

        return view('admin.cards.create', compact('cardTypes', 'games'));
    }

    public function edit($id)
    {
        return view('admin.cards.edit', compact('id'));
    }
}
