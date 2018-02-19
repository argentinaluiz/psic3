@extends('layouts.app')
@section('pag_title', 'Imagens - Excluídas')

@section('breadcrumb')
    <h2>Bibliotecas</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar imagens' => route('imagens.index'), 'Imagens Excluídas' ))!!}
@endsection

@section('h5-title')
     <h5>Lista de Imagens Excluídas</h5>
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
						<th>Imagem</th>
						<th>Ação</th>
					</tr>
				</thead>
				<tbody>
				@foreach($registros as $registro)
					<tr>
						<td>{{ $registro->id }}</td>
						<td>{{ $registro->title }}</td>
						<td>{{ $registro->description }}</td>
						<td><img width="50" src="{{$registro->textoUrl()}}" alt="{{$registro->title}}"></td>

						<td>
							<form action="{{route('imagens.recupera',$registro->id)}}" method="post">
								@can('imagens-delete')
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
			@can('imagens-create')
			<a class="btn btn-sm btn-primary" href="{{route('imagens.index')}}">Voltar</a>
			@endcan
		</div>
	</div>

@endsection
