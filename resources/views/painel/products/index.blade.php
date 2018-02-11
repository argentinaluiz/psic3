@extends('layouts.app')
@section('pag_title', 'Produtos')

@section('breadcrumb')
    <h2>Produtos</h2>
     {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar produtos' => route('painel.products.index') ))!!}
@endsection

@section('h5-title')
     <h5>Listagem de produtos</h5>
@endsection


@section('content')
	<span class="pull-right small text-muted">Total de produtos: {{ $totalProducts}}</span>
	<br/>
	<a class="btn btn-sm btn-primary" href="{{route('products.create') }}"><span class="glyphicon glyphicon-plus"></span> Criar novo</a>
	<div class="cleaner_h15"></div>
	<table class="table table-striped dataTables-products">
		<thead>
		<tr>
			<th>Nome</th>
			<th>Imagem</th>
			<th>Detallhes</th>
			<th>Preço anterior</th>
			<th>Preço vendido</th>
			<th>Descrição</th>
			<th>Destaque?</th>
			<th>Ativo?</th>
			<th>Ações</th>
		</tr>
		</thead>
		<tbody>
			@foreach($products as $product)
				<tr>
					<td>{{ $product->name }}</td>
					<td>
						@if($product->image)
							<img src="{{url("storage/products/{$product->image}")}}" alt="{{$product->id}}" style="max-width: 60px;">
						@else
							<img src="{{url('painel/imgs/no-image.png')}}" alt="{{$product->id}}" style="max-width: 100px;">
						@endif
					</td>
					<td>{{ $product->details }}</td>
					<td>R$ {{number_format($product->old_price, 2, ',', '.')}}</td>
					<td>R$ {{number_format($product->price, 2, ',', '.')}}</td>
					<td>{{ $product->description }}</td>
					<td>{{$product->featured?'Sim': 'Não'}}</td>
					<td>{{$product->active?'Sim': 'Não'}}</td>
					<td>
						<a href="{{route('products.edit',['product' => $product->id])}}"><span class="glyphicon glyphicon-pencil"></span> Editar</a> |
						<a href="{{route('products.show',['product' => $product->id])}}"><span class="glyphicon glyphicon-folder-open"></span> Ver</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection
