@extends('layouts.app')
@section('pag_title', 'Novo papel - Cadastrar')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Novo papel</h3> 
            @include('form._form_errors')
            {{ Form::open(['route' => 'roles.store']) }}
                @include('painel.roles._form')
                <button type="submit" class="btn btn-sm btn-default">Criar</button>
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection