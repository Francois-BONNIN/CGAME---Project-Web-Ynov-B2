@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-4 mb-4">
            <div class="card">
                <h1 class="card-header">Profil</h1>

                <div class="card-body">
                    <table class="table table-dark" style="width: 100%" >
                        <tbody class= "thead-dark" align='center'>
                            <tr>
                                <th style="width: 50%;"> Prénom </th>
                                <td style="width: 50%;">{{ $user -> firstname }}</td>
                            </tr>
                            <tr>
                                <th>Nom</th>
                                <td>{{ $user -> lastname }}</td>
                            </tr>

                            <tr>
                                <th>Email</th>
                                <td>{{ $user -> email }}</td>
                            </tr>

                            <tr>
                                <th>Date de naissance</th>
                                <td>{{ $user -> birthdate }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="{{ route('profile.edit', $user) }}">
                        <button class="btn btn-outline-light btn-block mt-0 mb-2"> Modifier </button>
                    </a>
                    <form action="{{ route('profile.destroy', $user)}}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-outline-danger btn-block mt-0" onclick="return  confirm(`Voulez-vous supprimer votre compte {{ $user -> firstname }} {{ $user -> lastname }} ? `)"> Supprimer </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-8 mb-4">
            <div class="card">
                <h1 class="card-header">Avis</h1>

                <div class="card-body">
                    <table class="table table-data2 table-striped table-dark" style="width: 100%">
                        <thead align="center">
                          <tr class="">
                            <th style="width: 10%;">Jeux</th>
                            <th style="width: 5%;">Note</th>
                            <th style="width: 60%;">Commentaire</th>
                            <th style="width: 10%;">Date</th>
                            <th style="width: 15%;"></th>
                          </tr>
                        </thead>
                        <tbody align="center">
                          @foreach ($reviews as $review)
                              <tr>
                                <td class="text-danger font-weight-bold">{{ $review -> game -> name }}</td>
                                <td>{{ $review -> grade }}</a></td>
                                <td>{{ $review -> comments }}</td>
                                <td>{{ $review -> created_at }}</td>
                                <td class="">
                                  <div class="d-flex justify-content-around">
                                    <a href="{{ route('reviews.edit', $review)}}" class="">
                                      <i class="far fa-edit fa-lg red-icon"></i>
                                    </a>
                                    <form action="{{ route('reviews.destroy', $review)}}" method="POST" class="d-inline" id="myform">
                                      @csrf
                                      @method('DELETE')
                                      <button class="btn-link fakebtn" type="submit"><i class="far fa-trash-alt fa-lg red-icon"></i></button>
                                    </form>
                                  </div>
                                </td>
                              </tr>
                              <tr class="spacer"></tr>
                          @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
