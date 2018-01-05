@extends('layouts.app')
@section('pag_title', 'Nova sala - Cadastrar')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Nova sala</h3> 
            @include('form._form_errors')
            {{ Form::open(['route' => 'rooms.store']) }}
                @include('painel.rooms._form')
                <button type="submit" class="btn btn-sm btn-default">Criar</button>
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection