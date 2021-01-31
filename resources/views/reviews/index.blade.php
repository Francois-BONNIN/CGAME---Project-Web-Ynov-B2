@extends('layouts.app')

@section('content')
<div class="mx-4 mb-4">
    <div class="card">
        <h1 class="card-header">Avis des membres</h1>
        <div class="card-body">
            <table class="table table-data2 table-striped table-dark" style="width: 100%">
                <thead align="center">
                <tr class="">
                    <th style="width: 10%;">Nom et Prénom</th>
                    <th style="width: 10%;">Jeux</th>
                    <th style="width: 5%;">Note</th>
                    <th style="width: 60%;">Commentaire</th>
                    <th style="width: 10%;">Date</th>
                    <th style="width: 15%;">Actions</th>
                </tr>
                </thead>
                <tbody align="center">
                @foreach ($reviews as $review)
                    <tr>
                        <td class="font-weight-bold">{{ $review -> user -> lastname }} {{ $review -> user -> firstname }}</td>
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
        <div class="row d-flex justify-content-center">
            {{ $reviews -> links() }}
        </div>
    </div>
</div>
@endsection