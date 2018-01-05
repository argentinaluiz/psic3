@extends('layouts.app')
@section('pag_title', 'Agenda - Mostrar')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Ver agenda</h3>
            <a class="btn btn-sm btn-primary" href="{{ route('agendas.edit',['agenda' => $agenda->id]) }}">Editar</a>
            <a class="btn btn-sm btn-danger" href="{{ route('agendas.destroy',['agenda' => $agenda->id]) }}"
                onclick="event.preventDefault();if(confirm('Deseja excluir este item?')){document.getElementById('form-delete').submit();}">Excluir</a>
            {{Form::open(['route' => ['agendas.destroy',$agenda->id],'method' => 'DELETE', 'id' => 'form-delete'])}}
            {{Form::close()}}
            <br/><br/>
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th scope="row">ID</th>
                        <td>{{$agenda->id}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Clínica</th>
                        <td>{{$agenda->clinic->name}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Sala</th>
                        <td>{{$agenda->room->name}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Psicanalista</th>
                        <td>{{$agenda->psychoanalyst->name}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Data</th>
                        <td>{{formatDateAndTime($agenda->date)}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Horário</th>
                        <td>{{formatDateAndTime($agenda->time, 'H:i')}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Valor anterior</th>
                        <td>R$ {{number_format($agenda->old_price, 2, ',', '.')}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Valor atual</th>
                        <td>R$ {{number_format($agenda->price, 2, ',', '.')}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Total de Parcelas</th>
                        <td>{{$agenda->stallments}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Promoção</th>
                        <td>{{$agenda->is_promotion ? 'SIM' : 'NÃO'}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Quantidade de sessões</th>
                        <td>{{$agenda->qty_sessions}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Descrição</th>
                        <td>{{$agenda->description}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>    
@endsection