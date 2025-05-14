<?php

namespace App\Http\Controllers;

use App\Models\Deck;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user(); // usuario autenticado
        $decks = Deck::where('user_id', $user->id)->with('game')->get();

        return view('profile.index', compact('decks'));
    }
}