@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Ver usuário</h3>
            <a class="btn btn-sm btn-primary" href="{{ route('users.edit',['user' => $user->id]) }}">Editar</a>
            <a class="btn btn-sm btn-danger" href="{{ route('users.destroy',['user' => $user->id]) }}"
                onclick="event.preventDefault();if(confirm('Deseja excluir este item?')){document.getElementById('form-delete').submit();}">Excluir</a>
            <!--<form id="form-delete"style="display: none" action="{{ route('users.destroy',['user' => $user->id]) }}" method="post">-->
            {{Form::open(['route' => ['users.destroy',$user->id],'method' => 'DELETE', 'id' => 'form-delete'])}}
            {{Form::close()}}
            <br/><br/>
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <th scope="row">ID</th>
                    <td>{{$user->id}}</td>
                </tr>
                <tr>
                    <th scope="row">Nome</th>
                    <td>{{$user->name}}</td>
                </tr>
                <tr>
                    <th scope="row">E-mail</th>
                    <td>{{$user->email}}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>    
@endsection