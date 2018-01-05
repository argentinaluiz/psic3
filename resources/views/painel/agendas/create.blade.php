@extends('layouts.app')
@section('pag_title', 'Nova agenda')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Nova agenda</h3> 
            @include('form._form_errors')
            {{ Form::open(['route' => 'agendas.store']) }}
                @include('painel.agendas._form')
                <button type="submit" class="btn btn-sm btn-default">Criar</button>
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection