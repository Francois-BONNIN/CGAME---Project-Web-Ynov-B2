@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Modifier un commentaire</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('reviews.update', $review) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="grade" class="col-md-4 col-form-label text-md-right">Note</label>

                            <div class="col-md-6">
                                <input id="grade" type="text" class="form-control" name="grade" required value="{{ $review -> grade }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="comments" class="col-md-4 col-form-label text-md-right">Commentaire</label>

                            <div class="col-md-6">
                                <textarea id="comments" type="area" class="form-control" name="comments" rows="6">{{ $review -> comments }}</textarea>
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
