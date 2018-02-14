@extends('layouts.app')
@section('pag_title', 'Produto - Galeria')

@section('breadcrumb')
    <h2>Produtos</h2>
     {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar produtos' => route('products.index'), 'Galeria' ))!!}
@endsection

@section('h5-title')
     <h5>Galeria de imagens</h5>
@endsection

@section('content')
	@component('painel.products.tabs-component',['product' => $form->getModel()])
		<div class="cleaner_h15"></div>
		@can('products-create')
			<a class="btn btn-sm btn-primary" href="{{route('products.gallery.create',$product)}}"><span class="glyphicon glyphicon-plus"></span> Adicionar</a>
		@endcan
		<div class="cleaner_h15"></div>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Imagem</th>
					<th>Título</th>
					<th>Descrição</th>
					<th>Ordem</th>
					<th>Ação</th>
				</tr>
			</thead>
			<tbody>
			@foreach($registros as $registro)
				<tr>
					<td><img width="50" src="{{ $registro->url }}"></td>
					<td>{{ $registro->title ? $registro->title : '---' }}</td>
					<td>{{ $registro->description ? $registro->description : '---' }}</td>
					<td>{{ $registro->order }}</td>
					<td>
						<form action="{{route('products.gallery.delete',$registro)}}" method="post">
							@can('products-edit')
								<a title="Editar" href="{{route('products.gallery.edit',$registro)}}"><span class="glyphicon glyphicon-pencil"></span> Editar</a> |
							@endcan
							@can('products-delete')
								{{ method_field('DELETE') }}
								{{ csrf_field() }}
								<button title="Deletar" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-remove"></span> Excluir</button>
							@endcan
						</form>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
		{{ $registros->links() }}
	@endcomponent
@endsection
