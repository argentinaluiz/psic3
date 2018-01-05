@extends('layouts.app')
@section('pag_title', 'Usuários - Regras')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Roles <-> User : <b>{{$user->name}}</h3>
            <br/>
            <a class="btn btn-default" href="{{route('users.create') }}">Criar novo</a>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th>Label</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                 @forelse( $roles as $role )
                    <tr>
                        <td>{{$role->name}}</td>
                        <td>{{$role->label}}</td>
                        <td>
                            <a class="btn btn-sm btn-danger" href="{{ route('roles.destroy',['role' => $role->id]) }}"
                                onclick="event.preventDefault();if(confirm('Deseja excluir este item?')){document.getElementById('form-delete').submit();}">Excluir</a>
                        
                            {{Form::open(['route' => ['roles.destroy',$role->id],'method' => 'DELETE', 'id' => 'form-delete'])}}
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
            {{$roles->links()}}
        </div>
    </div>
</div>
@endsection