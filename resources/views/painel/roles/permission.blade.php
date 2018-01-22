@extends('layouts.app')
@section('pag_title', 'Permissões')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Permissions: <b>{{$role->name}}</h3>
            <br/>
            <a class="btn btn-default" href="{{route('users.create') }}">Criar novo</a>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                 @forelse( $permissions as $permission )
                    <tr>
                        <td>{{$permission->name}}</td>
                        <td>{{$permission->description}}</td>
                        <td>
                            <a class="btn btn-sm btn-danger" href="{{ route('permissions.destroy',['permission' => $permission->id]) }}"
                                onclick="event.preventDefault();if(confirm('Deseja excluir este item?')){document.getElementById('form-delete').submit();}">Excluir</a>
                        
                            {{Form::open(['route' => ['permissions.destroy',$permission->id],'method' => 'DELETE', 'id' => 'form-delete'])}}
                            {{Form::close()}}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="90">
                            <p>Nenhum Resultado!</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection