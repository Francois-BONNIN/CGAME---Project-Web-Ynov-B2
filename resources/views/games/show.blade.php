@extends('layouts.app')

@section('content')
  <main class="container">
    <div class="dark-grey-text">

      <div class="row wow fadeIn">

        <div class="col-md-6 mb-2">
          <img src="{{ $game -> image }}" class="img-fluid" alt="">
        </div>

        <div class="col-md-6 mb-4">
            <h1 class="align-center"><strong>{{ $game -> name }}</strong></h1>
            <p class="lead"> <span class="mr-1">{{$game -> price}} €</span></p>

            <p class="lead font-weight-bold">Description</p>
            <p>{{ $game -> description }}</p>
            
            @guest
              <form action="{{ route('login') }}" class="d-flex justify-content-left">
                <button class="btn btn-outline-danger my-0 p" type="submit"> 
                    Ajouter au panier <i class="fas fa-shopping-cart ml-1"></i>
                </button>
              </form>
            @endguest
            @auth
              <form action="{{ route('carts.store') }}" method="POST" class="d-flex justify-content-left">
                @csrf
                <input type="hidden" name="game_id" value="{{ $game-> id }}">
                <button class="btn btn-outline-danger my-0 p" type="submit"> 
                  Ajouter au panier <i class="fas fa-shopping-cart ml-1"></i>
                </button>
              </form>
            @endauth
            
          </div>
        </div>
      </div>

      <hr>

      {{-- <div class="row wow fadeIn">
        <div class="col-lg-4 col-md-12 mb-4">
          <img src="{{ $game -> images}}" class="img-fluid" alt="">
        </div>

        <div class="col-lg-4 col-md-6 mb-4">
          <img src="{{ $game -> images}}" class="img-fluid" alt="">
        </div>

        <div class="col-lg-4 col-md-6 mb-4">
          <img src="{{ $game -> images}}" class="img-fluid" alt="">
        </div>
      </div> --}}

      <div class="d-flex justify-content-between">
        <h2>Commentaires et Avis :</h2>
        {{-- <form class="myform form-inline mt-2 mt-md-0 d-inline"> --}}
        <a href="{{route('reviews.create')}}" class="d-inline solde"><i class="far fa-plus-square fa-2x red-icon "></i></a>
      </div>
        <table class="table table-data2 table-striped table-dark" style="width: 100%">
            <thead align="center">
              <tr class="">
                <th style="width: 10%;">Nom</th>
                <th style="width: 5%;">Note</th>
                <th style="width: 60%;">Commentaire</th>
                <th style="width: 10%;">Date</th>
                <th style="width: 15%;"></th>
              </tr>
            </thead>
            <tbody align="center">
              @foreach ($reviews as $review)
                  <tr>
                    <td>{{ $review -> user -> firstname }} {{ $review -> user -> lastname }}</td>
                    <td>{{ $review -> grade }}</a></td>
                    <td>{{ $review -> comments }}</td>
                    <td>{{ $review -> created_at }}</td>
                    <td class="">
                      <div class="d-flex justify-content-around">
                        @if (Auth::user()->id == $review -> user -> id)
                        <a href="{{ route('reviews.edit', $review)}}" class="">
                          <i class="far fa-edit fa-lg red-icon"></i>
                        </a>
                        <form action="{{ route('reviews.destroy', $review)}}" method="POST" class="d-inline" id="myform">
                          @csrf
                          @method('DELETE')
                          <button class="btn-link fakebtn" type="submit"><i class="far fa-trash-alt fa-lg red-icon"></i></button>
                        </form>
                        @endif
                        @can('manage-items')
                        <form action="{{ route('reviews.destroy', $review)}}" method="POST" class="d-inline" id="myform">
                            @csrf
                            @method('DELETE')
                            <button class="btn-link fakebtn" type="submit"><i class="far fa-trash-alt fa-lg red-icon"></i></button>
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
      
    </div>
  </main>

@endsection