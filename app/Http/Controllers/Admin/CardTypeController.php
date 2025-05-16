<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\CardType;
use App\Models\Game;
use Illuminate\Http\Request;

class CardTypeController extends Controller
{
    public function index()
    {
        $cardTypes = CardType::all();
        return view('admin.card-types.index', compact('cardTypes'));
    }

    public function create()
    {
        $games = Game::all();
        return view('admin.card-types.create', compact('games'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:card_types,name',
            'games' => 'required|array|min:1',
            'games.*' => 'exists:games,id',
        ]);

         $cardType = CardType::create([
            'name' => $request->name,
        ]);

         $cardType->games()->attach($request->games);

        return redirect()->route('admin.card-types.index')->with('success', 'Card Type created successfully.');
    }

    public function edit(CardType $cardType)
    {
        $games = Game::all();

        $selectedGames = $cardType->games->pluck('id')->toArray();

        return view('admin.card-types.edit', compact('cardType', 'games', 'selectedGames'));
    }

    public function update(Request $request, CardType $cardType)
    {
        $request->validate([
            'name' => 'required|string|unique:card_types,name,' . $cardType->id,
            'games' => 'required|array|min:1',
            'games.*' => 'exists:games,id',
        ]);

        $cardType->update([
            'name' => $request->name,
        ]);

        $cardType->games()->sync($request->games);

        return redirect()->route('admin.card-types.index')->with('success', 'Card Type updated successfully.');
    }

    public function destroy(CardType $cardType)
    {
        $cardType->games()->detach();
        $cardType->delete();

        return redirect()->route('admin.card-types.index')->with('success', 'Card Type deleted successfully.');
    }

    public function getByGame(int $id)
    {
        $game = Game::findOrFail($id);

        if(!$game) {
            return response()->json(['error' => 'Game not found'], 404);
        }

        return response()->json($game->cardTypes()
            ->select('card_types.id as id', 'card_types.name') // <- Desambiguar aquí
            ->get());
    }


}
