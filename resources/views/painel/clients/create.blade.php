@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Novo cliente</h3>
            <h4>{{$clientType == \App\Models\Painel\Client::TYPE_INDIVIDUAL? 'Pessoa Física': 'Pessoa Jurídica'}}</h4>
            <a href="{{route('clients.create',['client_type' => \App\Models\Painel\Client::TYPE_INDIVIDUAL])}}">Pessoa Física</a> |
            <a href="{{route('clients.create',['client_type' => \App\Models\Painel\Client::TYPE_LEGAL])}}">Pessoa Jurídica</a>
            @include('form._form_errors')
            <!--<form method="post" action="{{ route('clients.store') }}">-->
            {{ Form::open(['route' => 'clients.store']) }}
                @include('painel.clients._form')
                <button type="submit" class="btn btn-default">Criar</button>
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection