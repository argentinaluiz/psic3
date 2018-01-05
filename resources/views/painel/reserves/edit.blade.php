@extends('layouts.app')
@section('pag_title', 'Nova reserva - Editar')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Editar sala</h3>
            @include('form._form_errors')
            {{ Form::model($reserve,['route' => ['reserves.update',$reserve->id], 'method' => 'PUT' ]) }}
                @include('painel.reserves._form')
                <button type="submit" class="btn btn-sm btn-default">Salvar</button>
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection