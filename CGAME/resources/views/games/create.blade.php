@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ajouter un jeu</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('games.store') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nom</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">Prix</label>

                            <div class="col-md-6">
                                <input id="price" type="text" class="form-control" name="price" required>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="quantity" class="col-md-4 col-form-label text-md-right">Quantité</label>

                            <div class="col-md-6">
                                <input id="quantity" type="quantity" class="form-control" name="quantity" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="activationcode" class="col-md-4 col-form-label text-md-right">Code d'activation</label>

                            <div class="col-md-6">
                                <input id="activationcode" type="text" class="form-control" name="activationcode" >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="grade" class="col-md-4 col-form-label text-md-right">Note</label>

                            <div class="col-md-6">
                                <input id="grade" type="text" class="form-control" name="grade" >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">Image URL</label>

                            <div class="col-md-6">
                                <input id="image" type="text" class="form-control" name="image">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>

                            <div class="col-md-6">
                                <textarea id="description" type="area" class="form-control" name="description" rows="5"></textarea>
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
