@extends('layouts.app')
@section('pag_title', 'Produto - Cadastrar')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Novo produto</h3> 
            @include('form._form_errors')
            {{ Form::open(['route' => 'painel.products.store', 'class' => 'form form-search form-ds', 'files' => true]) }}
                @include('painel.products._form')
                <button type="submit" class="btn btn-sm btn-default">Criar</button>
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection