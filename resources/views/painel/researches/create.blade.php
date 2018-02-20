@extends('layouts.app')
@section('pag_title', 'Pesquisa - Cadastrar')

@section('breadcrumb')
    <h2>Pesquisas</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar pesquisas' => route('researches.index'), 'Nova pesquisa' ))!!}
@endsection

@section('h5-title')
     <h5>Nova pesquisa</h5>
@endsection
 
@section('content')
    @include('form._form_errors')
    {{ Form::open(['route' => 'researches.store', 'class' => 'form form-search form-ds', 'files' => true]) }}
        @include('painel.researches._form')
        <button class="btn btn-primary btn-block" type="submit"><span class="glyphicon glyphicon-floppy-disk"></span>&nbsp;&nbsp;Adicionar</button>
    {{ Form::close() }}
    
@endsection
