@extends('layouts.app')
@section('pag_title', 'Biblioteca de imagens')

@section('breadcrumb')
    <h2>Bibliotecas</h2>
     {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar imagens' => route('imagens.index') ))!!}
@endsection

@section('h5-title')
     <h5>Listagem de imagens</h5>
@endsection


@section('content')
	<span class="pull-right small text-muted">Total de imagens: {{ $totalImagens}}</span>
	<br/>

	<div class="row">
		<div class="col-sm-2">
			@can('imagens-create')
				<a class="btn btn-sm btn-primary" href="{{route('imagens.create') }}"><span class="glyphicon glyphicon-plus"></span> Adicionar nova</a>
				<div class="cleaner_h15"></div>
			@endcan
		</div>
		<div class="col-sm-2">
			@can('imagens-edit')
				<a class="btn btn-sm btn-danger" href="{{route('imagens.excluidas')}}"><span class="glyphicon glyphicon-remove"></span> Excluídas</a>
			@endcan
		</div>
	</div>
	
	<table class="table table-striped">
		<thead>
		<tr>
			<th>Id</th>
			<th>Título</th>
			<th>Descrição</th>
			<th>Imagem</th>
			<th>Ações</th>
		</tr>
		</thead>
		<tbody>
			@foreach($registros as $registro)
				<tr>
					<td>{{ $registro->id }}</td>
					<td>{{ $registro->title }}</td>
					<td>{{ $registro->description }}</td>
					<td><img width="50" src="{{$registro->galeriaUrl()}}" alt="{{$registro->title}}"></td>

					<td>
						<form action="{{route('imagens.destroy',$registro->id)}}" method="post">
							@can('imagens-edit')
							<a href="{{route('imagens.edit',['image' => $registro->id])}}"><span class="glyphicon glyphicon-pencil"></span> Editar</a> |
							@endcan
							@can('imagens-delete')
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
@endsection
