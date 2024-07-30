@extends('layouts.admin')

@section('content')
    <div class="user-data m-b-30">
        <h3 class="title-3 m-b-30">
            <i class="zmdi zmdi-account-calendar"></i>Liste des Utilisateurs
        </h3>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('delete'))
            <div class="alert alert-danger">
                {{ session('delete') }}
            </div>
        @endif
        <div class="table-responsive table-data">
            <table class="table">
                <thead>
                    <tr>
                        <td>Nom</td>
                        <td>Email</td>
                        <td>Role</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user )   
                        <tr>
                            <td>
                                <div class="table-data__info">
                                    <h6>{{$user->nom}}</h6>
                                </div>
                            </td>
                            <td>
                                <span class="block-email">{{$user->email}}</span>
                            </td>
                            <td>
                                <span class="role user">
                                    {{$user->role}}
                                </span>
                            </td>
                            <td>
                                <div class="table-data-feature">
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Modifier">
                                        <a href="{{route('drh.edit',$user->id)}}">
                                        <i class="zmdi zmdi-edit"></i></a>
                                    </button>
                                    <form action="{{route('drh.delete',$user->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="item" type="submit" data-toggle="tooltip" data-placement="top" title="Supprimer">
                                            <i class="zmdi zmdi-delete"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection