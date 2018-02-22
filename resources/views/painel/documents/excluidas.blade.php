@extends('layouts.app')
@section('pag_title', 'Documentos - Excluídos')

@section('breadcrumb')
    <h2>Bibliotecas</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar documentos' => route('documents.index'), 'Documentos Excluídos' ))!!}
@endsection

@section('h5-title')
     <h5>Lista de Documentos Excluídos</h5>
@endsection

@section('content')
	<div class="row">
		<div class="col-sm-12">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Id</th>
						<th>Título</th>
						<th>Descrição</th>
						<th>Documento</th>
						<th>Ação</th>
					</tr>
				</thead>
				<tbody>
				@foreach($registros as $registro)
					<tr>
						<td>{{ $registro->id }}</td>
						<td>{{ $registro->title }}</td>
						<td>{{ $registro->description }}</td>
						<td></td>

						<td>
							<form action="{{route('documents.recupera',$registro->id)}}" method="post">
								@can('documents-delete')
									{{ method_field('PUT') }}
									{{ csrf_field() }}
									<button title="Recuperar" class="btn btn-sm btn-warning"><i class="fa fa-refresh"></i> restaurar</button>
								@endcan
							</form>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
			{{ $registros->links() }}
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			@can('documents-create')
			<a class="btn btn-sm btn-primary" href="{{route('documents.index')}}">Voltar</a>
			@endcan
		</div>
	</div>

@endsection
