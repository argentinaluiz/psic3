@extends('layouts.app')
@section('pag_title', 'Carrinho de compras - Produtos editar')

@section('content')
	<div class="container">
		<div class="row">
			<h3>Editar produto "{{ $registro->name }}"</h3>
			<form method="POST" action="{{ route('painel.products.atualizar', $registro->id) }}">
				{{ csrf_field() }}
				{{ method_field('PUT') }}

				@include('painel.products._form')

				<button type="submit" class="btn blue">Atualizar</button>
			</form>
		</div>
	</div>
	@include('painel.products._lib')
@endsection