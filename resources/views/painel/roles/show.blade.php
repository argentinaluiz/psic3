@extends('layouts.app')
@section('pag_title', 'Novo papel - Mostrar')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Ver função</h3>
            <a class="btn btn-sm btn-primary" href="{{ route('roles.edit',['role' => $role->id]) }}">Editar</a>
            <a class="btn btn-sm btn-danger" href="{{ route('roles.destroy',['role' => $role->id]) }}"
                onclick="event.preventDefault();if(confirm('Deseja excluir este item?')){document.getElementById('form-delete').submit();}">Excluir</a>
            <!--<form id="form-delete"style="display: none" action="{{ route('roles.destroy',['role' => $role->id]) }}" method="post">-->
            {{Form::open(['route' => ['roles.destroy',$role->id],'method' => 'DELETE', 'id' => 'form-delete'])}}
            {{Form::close()}}
            <br/><br/>
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <th scope="row">Nome</th>
                    <td>{{$role->name}}</td>
                </tr>
                <tr>
                    <th scope="row">Descrição</th>
                    <td>{{$role->description}}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>    
@endsection