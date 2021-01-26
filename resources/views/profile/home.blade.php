@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h1 class="card-header">{{ $user -> firstname }} {{ $user -> lastname }}</h1>

                <div class="card-body">
                    <table class="table table-dark" style="width: 100%" >
                        <tbody class= "thead-dark" align='center'>
                            <tr>
                                <th style="width: 50%;"></th>
                                <th style="width: 50%;"></th>
                            </tr>
                            <tr>
                                <th> Prénom </th>
                                <td>{{ $user -> firstname }}</td>
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
    </div>
</div>
@endsection
