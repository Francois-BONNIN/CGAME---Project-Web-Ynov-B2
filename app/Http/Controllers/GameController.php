<?php

namespace App\Http\Controllers;

use App\Game;
use App\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');

        if($search){
            $games = Game::where('name', 'like', '%'.$search.'%') 
            -> orWhere('price', 'like', '%'.$search.'%')
            -> get();
        }else{
            $games = Game::paginate(10);
        }
        return view('games.index', ["games" => $games]);
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
        $reviews = Review::where('game_id',$game->id)->get();
        return view('games.show', [
            "game"=> $game,
            "reviews" => $reviews
            ]);
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
