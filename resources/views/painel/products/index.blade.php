@extends('layouts.app')
@section('pag_title', 'Carrinho de compras - Produtos')

@section('content')
	<div class="container">
		<div class="row">
			<h3>Lista de produtos</h3>
			@if (Session::has('painel-mensagem-sucesso'))
	            <div class="card-panel green"><strong>{{ Session::get('painel-mensagem-sucesso') }}<strong></div>
	        @endif
			<table>
				<thead>
					<tr>
						<th></th>
						<th>ID</th>
						<th>Nome</th>
						<th>Valor</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($products as $product)
					<tr>
						<td>
							<a class="btn-flat tooltipped" href="{{ route('painel.products.editar', $product->id) }}" class="btn-flat tooltipped" data-position="right" data-delay="50" data-tooltip="Editar produto?">
								<i class="material-icons black-text">mode_edit</i>
							</a>
							<a class="btn-flat tooltipped" href="{{ route('painel.products.deletar', $product->id) }}" class="btn-flat tooltipped" data-position="right" data-delay="50" data-tooltip="Deletar produto?">
								<i class="material-icons black-text">delete</i>
								</a>
						</td>
						<td>{{ $product->id }}</td>
						<td>{{ $product->name }}</td>
						<td>R$ {{ $product->value }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<div class="row">
			<a class="btn-floating btn-large blue tooltipped" href="{{ route('painel.products.adicionar') }}" title="Adicionar" data-position="top" data-delay="50" data-tooltip="Adicionar produto?">
				<i class="material-icons">add</i>
			</a>
		</div>
	</div>

@endsection