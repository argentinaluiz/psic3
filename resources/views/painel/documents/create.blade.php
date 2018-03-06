@extends('layouts.app')
@section('pag_title', 'Documentos - Cadastrar')

@section('breadcrumb')
    <h2>Bibliotecas</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar documentos' => route('documents.index'), 'Novo documento' ))!!}
@endsection

@section('h5-title')
     <h5>Novo documento</h5>
@endsection
 
@section('content')
    @include('form._form_errors')
    {{ Form::open(['route' => 'documents.store', 'class' => 'form', 'enctype' => 'multipart/form-data', 'files' => true]) }}
        @include('painel.documents._form')
        <div class="cleaner_h15"></div>
        <button class="btn btn-primary btn-block" type="submit"><span class="glyphicon glyphicon-floppy-disk"></span>&nbsp;&nbsp;Adicionar</button>
    {{ Form::close() }}
@endsection

