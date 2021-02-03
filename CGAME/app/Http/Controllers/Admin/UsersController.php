<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function __construct(){
        $this -> middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nb_users = User::count();
        return view('admin.users.index', ['users' => User::paginate(5), "nb_users"=> $nb_users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::denies('manage-items')){
            return redirect() -> route('welcome');
        }

        return view('admin.users.create', ['roles' => Role::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $editUser = new User;
        $editUser -> firstname = $request ->input('firstname');
        $editUser -> lastname = $request ->input('lastname');
        $editUser -> email = $request ->input('email');
        $editUser -> birthdate = $request ->input('birthdate');
        $editUser -> balance = 0;
        $editUser -> password = Hash::make($request ->input('password'));
        $editUser -> save();

        $editUser -> roles() -> attach($request->input('roles'));

        return redirect() -> route('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if(Gate::denies('manage-items')){
            return redirect() -> route('admin.users.index');
        }

        return view('admin.users.edit', [
            'user' => $user,
            'roles' => Role::all(),
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $editUser = User::find($user ->id);
        $editUser -> firstname = $request ->input('firstname');
        $editUser -> lastname = $request ->input('lastname');
        $editUser -> email = $request ->input('email');
        $editUser -> birthdate = $request ->input('birthdate');
        $editUser -> push();

        $editUser -> roles() -> detach();
        $editUser -> roles() -> attach($request->input('roles'));

        return redirect() -> route('admin.users.index')-> with('success', 'Utilisateur mis à jour.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if(Gate::denies('manage-items')){
            return redirect() -> route('admin.users.index');
        };

        $deleteUser = User::find($user ->id);
        $deleteUser -> delete();

        return redirect() -> route('admin.users.index') -> with('success', 'Utilisateur supprimé.');
    }
}
