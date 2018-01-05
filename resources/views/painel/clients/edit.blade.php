@extends('layouts.app')
@section('pag_title', 'Clientes - Editar')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Editar cliente</h3>
            @include('form._form_errors')
            <!--<form method="post" action="{{ route('clients.update',['client' => $client->id]) }}">-->
            {{ Form::model($client,['route' => ['clients.update',$client->id], 'method' => 'PUT' ]) }}
                @include('painel.clients._form')
                <button type="submit" class="btn btn-sm btn-default">Salvar</button>
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection