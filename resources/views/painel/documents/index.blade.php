@extends('layouts.app')
@section('pag_title', 'Documentos')

@section('breadcrumb')
    <h2>Bibliotecas</h2>
     {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar documentos' => route('documents.index') ))!!}
@endsection

@section('h5-title')
     <h5>Listagem de documentos</h5>
@endsection


@section('content')
	<span class="pull-right small text-muted">Total de documentos: </span>
	<br/>

	<div class="row">
		<div class="col-sm-2">
			@can('documents-create')
				<a class="btn btn-sm btn-primary" href="{{route('documents.create') }}"><span class="glyphicon glyphicon-plus"></span> Adicionar novo</a>
				<div class="cleaner_h15"></div>
			@endcan
		</div>
		<div class="col-sm-2">
			@can('documents-edit')
				<a class="btn btn-sm btn-danger" href="{{route('documents.excluidas')}}"><span class="glyphicon glyphicon-remove"></span> Excluídas</a>
			@endcan
		</div>
	</div>
	
	<table class="table table-striped">
		<thead>
		<tr>
			<th>Id</th>
			<th>Título</th>
			<th>Documento</th>
			<th>Ações</th>
		</tr>
		</thead>
		<tbody>
			@foreach($registros as $registro)
				<tr>
					<td>{{ $registro->id }}</td>
					<td>{{ $registro->title }}</td>
					<td>{{ $registro }}</td>
					<td>
						<form action="{{route('documents.destroy',$registro->id)}}" method="post">
							@can('documents-edit')
							<a href="{{route('documents.edit',['document' => $registro->id])}}"><span class="glyphicon glyphicon-pencil"></span> Editar</a> |
							@endcan
							@can('documents-delete')
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
	 {!! $registros->links() !!}
@endsection
