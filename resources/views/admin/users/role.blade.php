@extends('layouts.app')
@section('pag_title', 'Usuários - Regras')

@section('breadcrumb')
    <h2>Configurações</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar usuários' => route('users.index'), 'Adicionar papéis' ))!!}
@endsection

@section('h5-title')
     <h5>Lista de Papéis para {{$user->name}}</h5>
@endsection


@section('content')
    <form action="{{route('users.role.store',$user->id)}}" method="post">
    {{ csrf_field() }}
    <div class="input-field">
        <select name="role_id">
            @foreach($role as $value)
                <option value="{{$value->id}}">{{$value->name}}</option>
            @endforeach
        </select>
    </div>
        <div class="cleaner_h15"></div>
        <button class="btn btn-sm btn-primary">Adicionar</button>
    </form>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped dataTables-users">
                <thead>
                    <tr>
                        <th>Papel</th>
                        <th>Descrição</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($user->roles as $role)
                    <tr>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->description }}</td>
                        <td>
                            <form action="{{route('users.role.destroy',[$user->id,$role->id])}}" method="post">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button title="Deletar" class="btn btn-sm btn-danger"><i class="material-icons">deletar</i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            </div>
    </div>
@endsection
