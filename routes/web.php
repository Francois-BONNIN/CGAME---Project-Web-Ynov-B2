<?php

use App\Game;
use Illuminate\Support\Facades\Route;

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
    return view('welcome', ['games' => Game::all()]);
})->name('welcome');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('profile', 'ProfileController');
Route::resource('games', 'GameController');

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-items')-> group(function(){
    Route::resource('users','UsersController');
});