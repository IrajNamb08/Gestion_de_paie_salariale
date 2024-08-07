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
        <form action="{{route('drh.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nom">Nom d'utilisateur</label>
                    <input type="text" class="form-control" name="nom" id="nom">
                </div>
                <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="password">Mot de passe</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
                <div class="form-group col-md-6 text-uppercase">
                    <label>Rôle</label><br>
                    <label class="custom-radio">
                        <input type="radio" id="rh" name="role" value="1">
                        <span>rh</span>
                    </label>
                    <label class="custom-radio">
                        <input type="radio" id="dg" name="role" value="2">
                        <span>dg</span>
                    </label>
                    <label class="custom-radio">
                        <input type="radio" id="daf" name="role" value="3" >
                        <span>daf</span>
                    </label>
                </div>
            </div>
            <div class="form-group text-right">
                <button type="submit" class="btn-submit">Enregistrer <i class="far fa-plus-square"></i></button>
            </div>
        </form>
    </div>
@endsection