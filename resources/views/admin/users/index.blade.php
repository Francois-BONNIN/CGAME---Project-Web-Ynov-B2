@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Liste des utilisateurs</div>

                <div class="card-body">
                    <table class="table table-dark" style="width: 100%" >
                        <thead class= "thead-dark" align='center'>
                            <tr>
                                <th style="width: 15%;">Prénom</th>
                                <th style="width: 15%;">Nom</th>
                                <th style="width: 15%;">Email</th>
                                <th style="width: 10%;">Role</th>
                                <th style="width: 45%;">Actions</th>
                            </tr>
                        </thead>
                        <tbody align='center'>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user -> firstname}}</td>
                                    <td>{{ $user -> lastname}}</td>
                                    <td>{{ $user -> email}}</td>
                                    <td>{{ implode(', ', $user -> roles() -> get() ->pluck('name')-> toArray())}}</td>
                                    <td>
                                        <a href="{{ route('admin.users.edit', $user) }}">
                                            <button class="btn btn-outline-light mt-0"> Modifier </button>
                                        </a>
                                        <form action="{{ route('admin.users.destroy', $user)}}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-outline-danger mt-0" onclick="return  confirm(`Voulez-vous supprimer le compte {{ $user -> firstname }} {{ $user -> lastname }} ? `)"> Supprimer </button>
                                        </form>
                                  </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
