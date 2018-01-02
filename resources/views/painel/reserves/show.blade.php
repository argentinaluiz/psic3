@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Ver reserva</h3>
            <a class="btn btn-sm btn-primary" href="{{ route('reserves.edit',['reserve' => $reserve->id]) }}">Editar</a>
            <a class="btn btn-sm btn-danger" href="{{ route('reserves.destroy',['reserve' => $reserve->id]) }}"
                onclick="event.preventDefault();if(confirm('Deseja excluir este item?')){document.getElementById('form-delete').submit();}">Excluir</a>
            {{Form::open(['route' => ['reserves.destroy',$reserve->id],'method' => 'DELETE', 'id' => 'form-delete'])}}
            {{Form::close()}}
            <br/><br/>
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <th scope="row">Paciente</th>
                    <td>{{$client->name}}</td>
                </tr>
                <tr>
                    <th scope="row">Agenda</th>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">Data reservada</th>
                    <td>{{formatDateAndTime($reserve->date_reserved)}}</td>
                </tr>
                 <tr>
                   @switch($reserve->status)
                        @case(1)
                            Reservado
                            @break
                        @case(2)
                            Cancelado
                            @break
                        @case(3)
                            Pago
                            @break								
                        @case(4)
                            Aguardando
                            @break
                    @endswitch
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>    
@endsection