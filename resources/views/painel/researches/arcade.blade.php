@extends('layouts.app')
@section('pag_title', 'Pesquisa - Galeria')

@section('breadcrumb')
    <h2>Pesquisas</h2>
     {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar pesquisas' => route('researches.index'), 'Galeria' ))!!}
@endsection

@section('h5-title')
     <h5>Galeria de documentos</h5>
@endsection

@section('content')
	@component('painel.researches.tabs-component',['research' => $form->getModel()])
		<div class="cleaner_h15"></div>
		@can('researches-create')
			<a class="btn btn-sm btn-primary" href="{{route('researches.arcade.create',$research)}}"><span class="glyphicon glyphicon-plus"></span> Adicionar</a>
		@endcan
		<div class="cleaner_h15"></div>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Documento</th>
					<th>Título</th>
					<th>Descrição</th>
					<th>Ordem</th>
					<th>Ação</th>
				</tr>
			</thead>
			<tbody>
			@foreach($registros as $registro)
				<tr>
					<td></td>
					<td>{{ $registro->title ? $registro->title : '---' }}</td>
					<td>{{ $registro->description ? $registro->description : '---' }}</td>
					<td>{{ $registro->order }}</td>
					<td>
						<form action="{{route('researches.arcade.delete',$registro)}}" method="post">
							@can('researches-edit')
								<a title="Editar" href="{{route('researches.arcade.edit',$registro)}}"><span class="glyphicon glyphicon-pencil"></span> Editar</a> |
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
	@endcomponent
@endsection
