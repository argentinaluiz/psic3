@extends('layouts.app')
@section('pag_title', 'Pesquisas - Cadastrar')

@section('breadcrumb')
    <h2>Pesquisas</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar pesquisas' => route('researches.index') ))!!}
@endsection

@section('h5-title')
     <h5>Listagem de Pesquisas</h5>
@endsection

@section('content')
	<span class="pull-right small text-muted">Total de pesquisas: {{ $totalResearches}}</span>
	<br/>
	<a class="btn btn-sm btn-primary" href="{{route('researches.create') }}"><span class="glyphicon glyphicon-plus"></span> Criar nova</a>
	<div class="cleaner_h15"></div>
	<table class="table table-striped">
		<thead>
		<tr>
			<th>Id</th>
			<th>Título</th>
			<th>Descrição</th>
			<th>Ano</th>
			<th>Categoria</th>
			<th>Ativo?</th>
		</tr>
		</thead>
		<tbody>
			@foreach($registros as $registro)
				<tr>
					<td>{{ $registro->id }}</td>
					<td>{{ $registro->title }}</td>
					<td>{{ $registro->description }}</td>
					<td>{{ $registro->year }}</td>
					<td>{{ $registro->active?'Sim': 'Não'}}</td>
					<td>{{ $registro->textoCategories }}</td>
					<td>
						<form action="{{route('researches.destroy',$registro->id)}}" method="post">
							@can('researches-edit')
								<a href="{{route('researches.edit',['search' => $search->registro])}}"><span class="glyphicon glyphicon-pencil"></span> Editar</a> |
								<a title="Galeria" class="btn btn-sm btn-primary" href="{{ route('researches.gallery.index',$registro) }}"><span class="glyphicon glyphicon-picture"></span> Imagem</a>
							@endcan
							@can('researches-delete')
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
