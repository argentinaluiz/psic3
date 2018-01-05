@extends('layouts.app')
@section('pag_title', 'Usuários - Cadastrar')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Novo usuário</h3> 
            @include('form._form_errors')
            {{ Form::open(['route' => 'users.store']) }}
                @include('painel.users._form')
                <button type="submit" class="btn btn-sm btn-default">Criar</button>
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection