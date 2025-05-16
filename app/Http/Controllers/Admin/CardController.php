<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

        return view('admin.cards.create', compact('games'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'game_id' => 'required|exists:games,id',
            'name' => 'required|string|max:255|unique:cards,name',
            'description' => 'nullable|string',
            'card_type_id' => 'nullable|exists:card_types,id',
            'image' => 'nullable|image|max:2048', // max 2MB
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('cards', 'public');
        }

        Card::create([
            'game_id' => $request->game_id,
            'name' => $request->name,
            'description' => $request->description,
            'card_type_id' => $request->card_type_id,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.cards.index')->with('success', 'Carta creada exitosamente.');
    }

    public function edit(Card $card)
    {
        $games = Game::all();
        // Para cargar los tipos del juego actual de la carta:
        $cardTypes = $card->game ? $card->game->cardTypes : collect();

        return view('admin.cards.edit', compact('card', 'games', 'cardTypes'));
    }

    public function update(Request $request, Card $card)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'game_id' => 'required|exists:games,id',
            'card_type_id' => 'nullable|exists:card_types,id',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
        // Eliminar la imagen anterior si existe
            if ($card->image) {
                Storage::disk('public')->delete($card->image);
            }

            $card->image = $request->file('image')->store('cards', 'public');
        }

        $card->update([
            'game_id' => $request->game_id,
            'name' => $request->name,
            'description' => $request->description,
            'card_type_id' => $request->card_type_id,
            'image' => $card->image,
        ]);

        return redirect()->route('admin.cards.index')->with('success', 'Carta actualizada exitosamente.');
    }

    public function destroy(Card $card)
    {
        // Eliminar la imagen del almacenamiento si existe
        if ($card->image) {
            Storage::disk('public')->delete($card->image);
        }

        $card->delete();

        return redirect()->route('admin.cards.index')->with('success', 'Carta eliminada exitosamente.');
    }

}
