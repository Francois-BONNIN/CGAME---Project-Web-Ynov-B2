@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Liste des jeux :</h2>
    <table class="table table-data2 table-striped table-dark ">
        <thead align="center">
          <tr class="">
            <th scope="col"></th>
            <th scope="col">Nom du jeu</th>
            <th scope="col">Prix</th>
            <th scope="col">Description</th>
            <th scope="col">Note</th>
            <th scope="col">Quantité</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody align="center">
            @foreach ($games as $game)
          <tr class="tr-shadow">
            <td><img src="{{ $game -> image }}" width="70px"></td>
            <td>{{ $game -> name }}</td>
            <td>{{ $game -> price }}</td>
            <td>{{ $game -> description }}</td>
            <td>{{ $game -> grade }}</td>
            <td>{{ $game -> quantity }}</td>
            <td></td>
          </tr>
          <tr class="spacer"></tr>
          @endforeach
        </tbody>
      </table>
  </div>
@endsection