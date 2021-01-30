<?php

namespace App\Http\Controllers;

use App\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('games.index', ["games" => Game::paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::denies('manage-items')){
            return redirect() -> route('games.index');
        }

        return view('games.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $createGame = new Game;
        $createGame -> name = $request ->input('name');
        $createGame -> price = $request ->input('price');
        $createGame -> quantity = $request ->input('quantity');
        $createGame -> grade = $request ->input('grade');
        $createGame -> description = $request ->input('description');
        $createGame -> image = $request ->input('image');
        $createGame -> save();

        return redirect() -> route('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        return view('games.show', ["game"=> $game]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game)
    {
        return view('games.edit', ["game"=> $game]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Game $game)
    {
        $editGames = Game::find($game ->id);
        $editGames -> name = $request ->input('name');
        $editGames -> price = $request ->input('price');
        $editGames -> grade = $request ->input('grade');
        $editGames -> quantity = $request ->input('quantity');
        $editGames -> description = $request ->input('description');
        $editGames -> push();

        return redirect() -> route('games.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        if(Gate::denies('manage-items')){
            return redirect() -> route('games.index');
        };

        $deleteGame = Game::find($game ->id);
        $deleteGame -> delete();

        return redirect() -> route('games.index');
    }
}
