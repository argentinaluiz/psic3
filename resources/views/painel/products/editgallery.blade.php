@extends('layouts.app')
@section('pag_title', 'Produto - Galeria')

@section('breadcrumb')
    <h2>Produtos</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar produtos' => route('painel.products.index'), 'Galeria' ))!!}
@endsection

@section('h5-title')
     <h5>Editar Galeria</h5>
@endsection

@section('content')
	@include('form._form_errors')
    {{ Form::model($product,['route' => ['products.gallery.update',$product->registro], 'class' => 'form form-search form-ds', 'files' => true, 'method' => 'PUT' ]) }}
        @include('painel.products._formgallery')			
        <button class="btn btn-primary btn-block" type="submit"><span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp;Salvar</button>
    {{ Form::close() }}
@endsection
