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
                    <td>{{$room->id}}</td>
                </tr>
                <tr>
                    <th scope="row">Clínica</th>
                    <td>{{$client}}</td>
                </tr>
                 <tr>
                    @switch($room->class_room)
                        @case(1)
                            Online
                            @break
                        @case(2)
                            Casal
                            @break
                        @case(3)
                            Divã
                            @break								
                        @case(4)
                            Criança
                            @break
                        @case(5)
                            Padrão
                            @break
                    @endswitch
                </tr>
                <tr>
                    <th scope="row">Quantidade de Pacientes</th>
                    <td>{{$room->qty_pacients}}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>    
@endsection