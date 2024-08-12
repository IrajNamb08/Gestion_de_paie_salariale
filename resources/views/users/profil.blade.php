@extends('layouts.admin')
@section('content')
    <div class="form-container">
        <p><i class="fas fa-sign-in-alt"></i></p>
        <h3 class="py-1">Mon compte</h3>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <hr>
        <form action="{{route('user.update',$user->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nom">Nom d'utilisateur</label>
                    <input type="text" value="{{old('nom', $user->nom)}}" class="form-control" name="nom" id="nom">
                </div>
                <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="email" value="{{old('email', $user->email)}}" class="form-control" name="email" id="email">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="password">Mot de passe</label>
                    <input type="password" class="form-control" name="password" id="password">
                    <small>Laissez vide pour conserver le mot de passe actuel.</small>
                </div>
                <div class="form-group col-md-2">
                    <label for="role">Privilège</label>
                    <input type="text" class="form-control text-uppercase text-center" value="{{old('role', $user->role)}}" name="role" id="role" disabled>
                </div>
            </div>
            <div class="form-group text-right">
                <button type="submit" class="btn-submit">Mettre à jour <i class="far fa-edit"></i></button>
            </div>
        </form>
    </div>
@endsection