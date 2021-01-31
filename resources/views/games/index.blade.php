@extends('layouts.app')

@section('content')
<div class="container">
  <div class="d-flex justify-content-between">
    <h2>Liste des jeux :</h2>
    <form class="myform form-inline mt-2 mt-md-0 d-inline">
        <input id="search" type="text" class="form-control" name="search" placeholder="Rechercher" size="14">
        <button class="fakebtn" type="submit"><i class="fas fa-search fa-lg red-icon "></i></a>
    </form>
  </div>
  <table class="table table-data2 table-striped table-dark" style="width: 100%">
      <thead align="center">
        <tr class="">
          <th style="width: 10%;"></th>
          <th style="width: 10%;">Nom du jeu</th>
          <th style="width: 5%;">Prix</th>
          <th style="width: 50%;">Description</th>
          <th style="width: 5%;">Note</th>
          <th style="width: 5%;">Quantité</th>
          <th style="width: 15%;">Actions</th>
        </tr>
      </thead>
      <tbody align="center">
        @foreach ($games as $game)
        <tr>
          <td><a href="{{ route('games.show', $game )}}"><img src="{{ $game -> image }}" class="img-shadow" width="80px"></a></td>
          <td><a href="{{ route('games.show', $game )}}" class="text-danger font-weight-bold">{{ $game -> name }}</a></td>
          <td>{{ $game -> price }}€</td>
          <td>{{ $game -> description }}</td>
          <td>{{ $game -> grade }}</td>
          <td>{{ $game -> quantity }}</td>
          <td class="">
            <div class="d-flex justify-content-around">
              @guest
              <a href="{{ route('login') }}">
                  <i class="fas fa-shopping-cart fa-lg red-icon"></i>
              </a>
              @endguest
              @auth
              <form action="{{ route('carts.store') }}" method="POST" class="d-inline">
                @csrf
                <input type="hidden" name="game_id" value="{{ $game-> id }}">
                <button class="btn-link fakebtn" type="submit"><i class="fas fa-shopping-cart fa-lg red-icon"></i></button>
              </form>
              @endauth
                <a href="{{ route('games.show', $game )}}" class="">
                  <i class="far fa-eye fa-lg red-icon"></i>
                </a>
                @can('manage-items')
                  <a href="{{ route('games.edit', $game)}}" class="">
                    <i class="far fa-edit fa-lg red-icon"></i>
                  </a>
                  <form action="{{ route('games.destroy', $game)}}" method="POST" class="d-inline" id="myform">
                    @csrf
                    @method('DELETE')
                    <button class="btn-link fakebtn" type="submit" onclick="return confirm(`Voulez-vous supprimer le jeu {{ $game -> name }} ? `)"><i class="far fa-trash-alt fa-lg red-icon"></i></button>
                  </form>
                @endcan
            </div>
          </td>
        </tr>
        <tr class="spacer"></tr>
        @endforeach
      </tbody>
    </table>
    <div class="row d-flex justify-content-center">
      {{ $games -> links() }}
    </div>
  </div>
@endsection