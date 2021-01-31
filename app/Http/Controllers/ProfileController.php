<?php

namespace App\Http\Controllers;

use App\User;
use App\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { 
        $user = $request->user();
        $reviews = Review::where('user_id',$user->id)->get();
        return view('profile.home', ['user'=>$user,'reviews'=> $reviews]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $user = $request->user();
        return view('profile.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {   
        $editProfile = $request->user();
        $editProfile -> firstname = $request ->input('firstname');
        $editProfile -> lastname = $request ->input('lastname');
        $editProfile -> email = $request ->input('email');
        $editProfile -> birthdate = $request ->input('birthdate');
        $editProfile -> password = Hash::make($request ->input('password'));
        $editProfile -> push();

        return redirect()->route('profile.index')->with('success', 'Your profile has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $deleteProfile = $request->user();
        $deleteProfile -> delete();

        return redirect()->route('welcome')-> with('success','Deleted account.');
    }
}
