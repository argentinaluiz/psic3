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
    {{ Form::model($product,['route' => ['products.gallery.update',$product->id], 'class' => 'form form-search form-ds', 'files' => true, 'method' => 'PUT' ]) }}
        @include('painel.products._form')




				
        <button class="btn btn-primary btn-block" type="submit"><span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp;Salvar</button>
    {{ Form::close() }}

	<div class="row">
		<form action="{{ route('products.galeria.update',$registro) }}" method="post">

		{{csrf_field()}}
		{{ method_field('PUT') }}

		<div class="input-field">
			<input type="text" name="titulo" class="validade" value="{{ isset($registro->titulo) ? $registro->titulo : '' }}{{old('titulo')}}">
			<label>Título</label>
		</div>

		<div class="input-field">
			<input type="text" name="descricao" class="validade" value="{{ isset($registro->descricao) ? $registro->descricao : '' }}{{old('descricao')}}">
			<label>Descrição</label>
		</div>

		<div class="input-field">
			<input type="text" name="ordem" class="validade" value="{{ isset($registro->ordem) ? $registro->ordem : '' }}{{old('ordem')}}">
			<label>Ordem</label>
		</div>

		<button class="btn blue">Atualizar</button>


		</form>

	</div>




@endsection
