@extends('layouts.app')
@section('pag_title', 'Produto - Editar')

@section('breadcrumb')
    <h2>Produtos</h2>
     {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar produtos' => route('painel.products.index'), 'Editar produto' ))!!}
@endsection

@section('h5-title')
     <h5>Editar produto</h5>
@endsection

@section('content')

    @include('form._form_errors')
    {{ Form::model($product,['route' => ['products.update',$product->id], 'class' => 'form form-search form-ds', 'files' => true, 'method' => 'PUT' ]) }}
        @include('painel.products._form')
        <button class="btn btn-primary btn-block" type="submit"><span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp;Salvar</button>
    {{ Form::close() }}

@endsection