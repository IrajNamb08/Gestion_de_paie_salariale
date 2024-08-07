@extends('layouts.admin')
@section('content')
    <div class="form-container">
        <p><i class="fas fa-sign-in-alt"></i></p>
        <h3 class="py-1">Nouveau Accès</h3>
        @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        <hr>
        <form action="{{route('drh.update', $user->id)}}" method="POST" enctype="multipart/form-data">
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
                <div class="form-group col-md-6 text-uppercase">
                    <label>Rôle</label><br>
                    <label class="custom-radio">
                        <input type="radio" {{ $user->role == 'rh' ? 'checked' : '' }} id="rh" name="role" value="1">
                        <span>rh</span>
                    </label>
                    <label class="custom-radio">
                        <input type="radio" {{ $user->role== 'dg' ? 'checked' : '' }} id="dg" name="role" value="2">
                        <span>dg</span>
                    </label>
                    <label class="custom-radio">
                        <input type="radio" id="daf" {{ $user->role== 'daf' ? 'checked' : '' }} name="role" value="3" >
                        <span>daf</span>
                    </label>
                </div>
            </div>
            <div class="form-group text-right">
                <button type="submit" class="btn-submit">Mettre à jour <i class="far fa-edit"></i></button>
            </div>
        </form>
    </div>
@endsection