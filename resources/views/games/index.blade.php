@extends('layouts.app')

@section('item-nav')
  @can('manage-items')
    <li class="nav-item links">
      <a href="{{ route('games.create')}}" class="nav-link">
        <i class="far fa-lg red-icon fa-plus-square"></i>
      </a>
    </li>
  @endcan  
@endsection

@section('content')
<div class="container">
    <h2>Liste des jeux :</h2>
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
                <a href="" class="">
                    <i class="fas fa-shopping-cart fa-lg red-icon"></i>
                </a>
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
                    <button class="btn-link fakebtn"type="submit" onclick="return confirm(`Voulez-vous supprimer le jeu {{ $game -> name }} ? `)"><i class="far fa-trash-alt fa-lg red-icon"></i></button>
                  </form>
                @endcan
              </div>
            </td>
          </tr>
          <tr class="spacer"></tr>
          @endforeach
        </tbody>
      </table>
  </div>
@endsection