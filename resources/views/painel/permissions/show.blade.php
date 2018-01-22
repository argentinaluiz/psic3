@extends('layouts.app')
@section('pag_title', 'Permissão - Mostrar')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Ver permissão</h3>
            <a class="btn btn-sm btn-primary" href="{{ route('permissions.edit',['permission' => $permission->id]) }}">Editar</a>
            <a class="btn btn-sm btn-danger" href="{{ route('permissions.destroy',['permission' => $permission->id]) }}"
                onclick="event.preventDefault();if(confirm('Deseja excluir este item?')){document.getElementById('form-delete').submit();}">Excluir</a>
            
            {{Form::open(['route' => ['permissions.destroy',$permission->id],'method' => 'DELETE', 'id' => 'form-delete'])}}
            {{Form::close()}}
            <br/><br/>
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <th scope="row">Nome</th>
                    <td>{{$permission->name}}</td>
                </tr>
                <tr>
                    <th scope="row">Descrição</th>
                    <td>{{$permission->description}}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>    
@endsection