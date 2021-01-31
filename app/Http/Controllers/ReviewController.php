<?php

namespace App\Http\Controllers;

use App\Game;
use App\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reviews.create', ['games'=> Game::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newReview = new Review;
        $newReview -> game_id = $request ->input('games');
        $newReview -> user_id = Auth::user()->id;
        $newReview -> grade = $request ->input('grade');
        $newReview -> comments = $request ->input('comments');
        $newReview -> save();


        return redirect() -> back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        return view('reviews.edit', ["review"=> $review, 'games'=> Game::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        $editReview = Review::find($review ->id);
        $editReview -> grade = $request ->input('grade');
        $editReview -> comments = $request ->input('comments');
        $editReview -> push();

        return redirect() -> route('profile.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        $deleteReview = Review::find($review ->id);
        $deleteReview -> delete();

        return redirect() -> back();
    }
}
