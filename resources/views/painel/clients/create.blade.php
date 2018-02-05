@extends('layouts.app')
@section('pag_title', 'Clientes: Cadastrar')

@section('breadcrumb')
    <h2>Configurações</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar clientes' => route('clients.index'), 'Novo cliente'))!!}
@endsection

@section('h5-title')
     <h5>Novo cliente</h5>
@endsection

@section('content')
    <h4>{{$clientType == \App\Models\Painel\Client::TYPE_INDIVIDUAL? 'Pessoa Física': 'Pessoa Jurídica'}}</h4>
    <a href="{{route('clients.create',['client_type' => \App\Models\Painel\Client::TYPE_INDIVIDUAL])}}">Pessoa Física</a> |
    <a href="{{route('clients.create',['client_type' => \App\Models\Painel\Client::TYPE_LEGAL])}}">Pessoa Jurídica</a>
    @include('form._form_errors')
    <!--<form method="post" action="{{ route('clients.store') }}">-->
    {{ Form::open(['route' => 'clients.store']) }}
        @include('painel.clients._form')
        <button type="submit" class="btn btn-default">Criar</button>
    {{ Form::close() }}
@endsection