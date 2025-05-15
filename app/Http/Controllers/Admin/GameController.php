<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index(){

        $games = Game::all();

        return view('admin.games.index',compact('games'));
    }

    public function create(){
        return view('admin.games.create');
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        Game::create([
            'name' => $request->name
        ]);

        return redirect()->route('admin.games.index')->with('success', 'Game created successfully.');
    }
    public function edit(Game $game){
        return view('admin.games.edit', compact('game'));
    }
    public function update(Request $request, Game $game){

        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $game->name = $request->name;

        $game->save();

        return redirect()->route('admin.games.index')->with('success', 'Game updated successfully.');
    }
    public function destroy(Game $game){
        $game->delete();

        return redirect()->route('admin.games.index')->with('success', 'Game deleted successfully.');
    }
}
