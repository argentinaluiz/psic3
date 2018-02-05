@extends('layouts.app')
@section('pag_title', 'Produto - Cadastrar')

@section('breadcrumb')
    <h2>Configurações</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar produtos' => route('painel.products.index'), 'Novo produto' ))!!}
@endsection

@section('h5-title')
     <h5>Novo produto</h5>
@endsection
 
@section('content')
    @include('form._form_errors')
    {{ Form::open(['route' => 'painel.products.store', 'class' => 'form form-search form-ds', 'files' => true]) }}
        @include('painel.products._form')
        <button class="btn btn-primary btn-block" type="submit"><span class="glyphicon glyphicon-floppy-disk"></span>&nbsp;&nbsp;Inserir</button>
    {{ Form::close() }}
@endsection