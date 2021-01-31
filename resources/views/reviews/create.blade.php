@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ajouter un commentaire</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('reviews.store') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="grade" class="col-md-4 col-form-label text-md-right">Note</label>

                            <div class="col-md-6">
                                <input id="grade" type="text" class="form-control" name="grade" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="comments" class="col-md-4 col-form-label text-md-right">Commentaire</label>

                            <div class="col-md-6">
                                <textarea id="comments" type="area" class="form-control" name="comments" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="games" class="col-md-4 col-form-label text-md-right">Jeux :</label>

                            <div class="col-md-6">
                                <select name="games" id="name" class="col-md-4 col-form-label text-md-right select">
                                @foreach ($games as $game)
                                    <option id="games" name="games" value="{{ $game -> id }}">{{ $game -> name }}</option>
                                @endforeach
                                </select>   
                            </div>
                        </div>              
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-outline-light">Modifier</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
