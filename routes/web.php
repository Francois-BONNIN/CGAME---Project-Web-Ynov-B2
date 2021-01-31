<?php

use App\Game;
use Illuminate\Support\Facades\Route;
use Gloudemans\Shoppingcart\Facades\Cart;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome', ['games' => Game::paginate(6)]);
})->name('welcome');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-items')-> group(function(){
    Route::resource('users','UsersController');
});

Route::resource('profile', 'ProfileController');
Route::resource('games', 'GameController');
Route::resource('reviews', 'ReviewController');

/* Purchase Route */
Route::get('/cart','CartsController@show')->name('carts.show');
Route::post('/cart/add', 'CartsController@store')-> name('carts.store');
Route::delete('/cart/{rowId}', 'CartsController@destroy')-> name('carts.destroy');
Route::get('/cart/clear', function(){
    Cart::destroy();
    return redirect()->route('games.index');
});