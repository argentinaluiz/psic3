@extends('layouts.app')
@section('pag_title', 'Clientes - Editar')

@section('breadcrumb')
    <h2>Configurações</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar clientes' => route('clients.index'), 'Editar cliente'))!!}
@endsection

@section('h5-title')
     <h5>Editar cliente</h5>
@endsection

@section('content')

    @include('form._form_errors')
    <!--<form method="post" action="{{ route('clients.update',['client' => $client->id]) }}">-->
    {{ Form::model($client,['route' => ['clients.update',$client->id], 'method' => 'PUT' ]) }}
        @include('painel.clients._form')
        <button type="submit" class="btn btn-sm btn-default">Salvar</button>
    {{ Form::close() }}

@endsection