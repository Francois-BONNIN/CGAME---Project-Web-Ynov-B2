@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Modifier <strong>{{ $game -> name }}</strong></div>
                <div class="card-body">
                    <form method="POST" action="{{ route('games.update', $game) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nom</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $game -> name }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">Prix</label>

                            <div class="col-md-6">
                                <input id="price" type="text" class="form-control" name="price" value="{{ old('price') ?? $game -> price }}" required>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="quantity" class="col-md-4 col-form-label text-md-right">Quantité</label>

                            <div class="col-md-6">
                                <input id="quantity" type="quantity" class="form-control" name="quantity" value="{{ old('quantity') ?? $game -> quantity }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="grade" class="col-md-4 col-form-label text-md-right">Note</label>

                            <div class="col-md-6">
                                <input id="grade" type="text" class="form-control" name="grade" value="{{ $game -> grade }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>

                            <div class="col-md-6">
                                <textarea id="description" type="area" class="form-control" name="description" rows="5">{{ $game -> description }}</textarea>
                            </div>
                        </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-outline-light">Modifier</button>
                                <form action="{{ route('games.destroy', $game)}}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger mt-0" onclick="return  confirm(`Voulez-vous supprimer le compte {{ $game -> name }} ? `)"> Supprimer </button>
                                </form>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
