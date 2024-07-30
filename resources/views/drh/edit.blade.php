@extends('layouts.admin')
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">Modifier un utilisateur</div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card-body card-block">
                <form action="{{route('drh.update', $user->id)}}" method="POST" autocomplete="off">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon">Nom de l'utilisateur</div>
                            <input type="text" id="nom" name="nom" class="form-control" value="{{old('nom', $user->nom)}}" required>
                            <div class="input-group-addon">
                                <i class="fa fa-user"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon">Email</div>
                            <input type="email" id="email" name="email" class="form-control" value="{{old('email', $user->email)}}" required>
                            <div class="input-group-addon">
                                <i class="fa fa-envelope"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon">Mot de Passe</div>
                            <input type="password" id="password" name="password" value="{{old('password', $user->password)}}" class="form-control">
                            <div class="input-group-addon">
                                <i class="fa fa-asterisk"></i>
                            </div>
                        </div>
                        <small>Laissez vide pour conserver le mot de passe actuel.</small>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label class=" form-control-label">Choisissez son rôle</label>
                        </div>
                        <div class="col col-md-9">
                            <div class="form-check-inline form-check">
                                <label for="inline-radio1" class="form-check-label ">
                                    <input type="radio" name="role" value="1" {{$user->role == 1 ? 'checked' : ''}} class="form-check-input">RH
                                </label>
                                <label for="inline-radio2" class="form-check-label ">
                                    <input type="radio" name="role" value="2" {{$user->role == 2 ? 'checked' : ''}} class="form-check-input">DG
                                </label>
                                <label for="inline-radio3" class="form-check-label ">
                                    <input type="radio"  name="role" value="3" {{$user->role == 3 ? 'checked' : ''}} class="form-check-input">DAF
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions form-group">
                        <button type="submit" class="btn btn-success btn-sm">Mettre à jour</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection