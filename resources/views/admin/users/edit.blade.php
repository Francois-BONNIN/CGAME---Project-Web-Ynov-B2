@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Modifier <strong>{{ $user -> firstname }} {{ $user -> lastname }}</strong></div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.users.update', $user) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="firstname" class="col-md-4 col-form-label text-md-right">Prénom</label>

                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control" name="firstname" value="{{ $user -> firstname }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lastname" class="col-md-4 col-form-label text-md-right">Nom</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control" name="lastname" value="{{ $user -> lastname }}">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') ?? $user -> email }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="birthdate" class="col-md-4 col-form-label text-md-right">Date de naissance</label>

                            <div class="col-md-6">
                                <input id="birthdate" type="date" class="form-control" name="birthdate" value="{{ $user -> birthdate }}">
                            </div>
                        </div>
                        
                        <label for="roles" class="col-md-4 col-form-label text-md-right">Role(s) :</label>
                        @foreach ($roles as $role)
                            <div class="form-check col-md-7 text-md-right row">
                                <input id={{ $role -> id }} type="checkbox" class="form-check-input" name="roles[]" value="{{ $role -> id }}"
                                @foreach ($user -> roles as $userRole)
                                    @if ($role -> name == $userRole -> name)
                                        checked
                                    @endif
                                @endforeach
                                >
                                <label for="{{ $role -> id }}" class="col-md-4 text-md-left form-check-label">{{ $role -> name }}</label>
                            </div>
                        @endforeach

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
