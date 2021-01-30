@extends('layouts.app')

@section('content')
  <main class="mt-5 pt-4">
    <div class="container dark-grey-text mt-5">

      <div class="row wow fadeIn">

        <div class="col-md-6 mb-2">
          <img src="{{ $game -> image }}" class="img-fluid" alt="">
        </div>

        <div class="col-md-6 mb-4">
            <h2 class="text-center">{{ $game -> name }}</h2>
            <p class="lead"> <span class="mr-1">{{$game -> price}} €</span></p>

            <p class="lead font-weight-bold">Description</p>
            <p>{{ $game -> description }}</p>

            <form class="d-flex justify-content-left">
            <button class="btn btn-primary my-0 p" type="submit"> 
                Ajouter au panier <i class="fas fa-shopping-cart ml-1"></i>
            </button>
            </form>
          </div>
        </div>
      </div>

      <hr>

      <div class="row wow fadeIn">
        <div class="col-lg-4 col-md-12 mb-4">
          <img src="{{ $game -> images}}" class="img-fluid" alt="">
        </div>

        <div class="col-lg-4 col-md-6 mb-4">
          <img src="{{ $game -> images}}" class="img-fluid" alt="">
        </div>

        <div class="col-lg-4 col-md-6 mb-4">
          <img src="{{ $game -> images}}" class="img-fluid" alt="">
        </div>
      </div>

      <div class="container">
        <h2>Commentaires et Avis :</h2>
        <ul class="responsive-table">
            <li class="table-header">
                <div class="col col-1">Nom du rédacteur</div>
                <div class="col col-2">Note</div>
                <div class="col col-3">Commentaire</div>
                <div class="col col-4">Date de publication</div>
            </li>
          @foreach ($game -> reviews as $review)
            <li class="table-row">
                <div class="col col-1" data-label="Nom du rédacteur">{{ $review -> users -> firstname }}{{ $review -> users -> lastname }}</div>
                <div class="col col-2" data-label="Note">{{ $review -> grade }}</div>
                <div class="col col-3" data-label="Commentaire">{{ $review -> comments }}</div>
                <div class="col col-3" data-label="Date">{{ $review -> created_at }}</div>
            </li>
          @endforeach
        </ul>
      </div>
      
    </div>
  </main>

@endsection