@extends('layouts.app')
@section('pag_title', 'Carrinho de compras - Produtos adicionar')

@section('content')
	<div class="container">
		<div class="row">
			<h3>Adicionar produto</h3>
			<form method="POST" action="{{ route('painel.products.salvar') }}">
				{{ csrf_field() }}
				@include('painel.products._form')

				<button type="submit" class="btn blue">Salvar</button>
			</form>
		</div>
	</div>
	@include('painel.products._lib')
@endsection