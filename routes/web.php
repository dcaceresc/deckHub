<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\GameController;
use App\Http\Controllers\Admin\CardController;


Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/about', function(){
    return view('about');
})->name('about');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'is_admin'])->prefix('admin')->group(function () {
    Route::get('users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('users/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('users', [UserController::class, 'store'])->name('admin.users.store');
    Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::patch('users/{user}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');

    Route::get('roles', [RoleController::class, 'index'])->name('admin.roles.index');
    Route::get('roles/create', [RoleController::class, 'create'])->name('admin.roles.create');
    Route::post('roles', [RoleController::class, 'store'])->name('admin.roles.store');
    Route::get('roles/{role}/edit', [RoleController::class, 'edit'])->name('admin.roles.edit');
    Route::patch('roles/{role}', [RoleController::class, 'update'])->name('admin.roles.update');
    Route::delete('roles/{role}', [RoleController::class, 'destroy'])->name('admin.roles.destroy');

    Route::get('games', [GameController::class, 'index'])->name('admin.games.index');
    Route::get('games/create', [GameController::class, 'create'])->name('admin.games.create');
    Route::post('games', [GameController::class, 'store'])->name('admin.games.store');
    Route::get('games/{game}/edit', [GameController::class, 'edit'])->name('admin.games.edit');
    Route::patch('games/{game}', [GameController::class, 'update'])->name('admin.games.update');
    Route::delete('games/{game}', [GameController::class, 'destroy'])->name('admin.games.destroy');

    Route::get('cards', [CardController::class, 'index'])->name('admin.cards.index');
    Route::get('cards/create', [CardController::class, 'create'])->name('admin.cards.create');
    Route::post('cards', [CardController::class, 'store'])->name('admin.cards.store');
    Route::get('cards/{card}/edit', [CardController::class, 'edit'])->name('admin.cards.edit');
    Route::patch('cards/{card}', [CardController::class, 'update'])->name('admin.cards.update');
    Route::delete('cards/{card}', [CardController::class, 'destroy'])->name('admin.cards.destroy');

});


require __DIR__.'/auth.php';
