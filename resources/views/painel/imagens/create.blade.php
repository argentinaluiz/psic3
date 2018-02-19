@extends('layouts.app')
@section('pag_title', 'Imagem- Cadastrar')

@section('breadcrumb')
    <h2>Bibliotecas</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar imagens' => route('imagens.index'), 'Nova imagem' ))!!}
@endsection

@section('h5-title')
     <h5>Nova imagem</h5>
@endsection
 
@section('content')
    @include('form._form_errors')
    {{ Form::open(['route' => 'imagens.store', 'class' => 'form form-search form-ds', 'files' => true]) }}
        @include('painel.imagens._form')
        <div class="cleaner_h15"></div>
        <button class="btn btn-primary btn-block" type="submit"><span class="glyphicon glyphicon-floppy-disk"></span>&nbsp;&nbsp;Adicionar</button>
    {{ Form::close() }}
@endsection