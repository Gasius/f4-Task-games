<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGameRequest;
use App\Http\Requests\UpdateGameRequest;
use App\Models\Game;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class GameController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $isAdmin = $user && $user->isAdmin();

        if ($isAdmin) {
            $games = Game::latest()->paginate(10);
        } else {
            $games = Game::available()->latest()->paginate(10);
        }

        return inertia('Home/Index', [
            'games' => $games,
            'isAdmin' => $isAdmin,
        ]);
    }

    public function create()
    {
        return inertia('Games/Create');
    }

    public function store(StoreGameRequest $request)
    {
        Game::create($request->validated());
        return redirect()->route('games.index')->with('success', 'Игра успешно добавлена!');
    }

    public function show(Game $game)
    {
        return inertia('Home/Game', ['game' => $game]);
    }

    public function edit(Game $game)
    {
        return inertia('Games/Edit', ['game' => $game]);
    }

    public function update(UpdateGameRequest $request, Game $game)
    {
        $game->update($request->validated());
        return redirect()->route('games.index');
    }

    public function destroy(Game $game)
    {
        $game->delete();
        return redirect()->route('games.index');
    }
}

