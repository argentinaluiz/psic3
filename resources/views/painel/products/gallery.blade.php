@extends('layouts.app')
@section('pag_title', 'Pesquisas - Cadastrar')

@section('breadcrumb')
    <h2>Pesquisas</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar pesquisas' => route('researches.index'), 'Nova pesquisa' ))!!}
@endsection

@section('h5-title')
     <h5>Nova pesquisa</h5>
@endsection

@section('content')
	<div class="container">
		<h2 class="center">Galeria de imagens</h2>

		@include('admin._caminho')
		<div class="row">
			<table>
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
            <td><img width="50" class="materialboxed" src="{{ $registro->url }}"></td>

						<td>{{ $registro->titulo ? $registro->titulo : '---' }}</td>
						<td>{{ $registro->descricao ? $registro->descricao : '---' }}</td>
						<td>{{ $registro->ordem }}</td>


						<td>

              <form action="" method="post">
								@can('carros-edit')
								<a title="Editar" class="btn orange" href=""><i class="material-icons">mode_edit</i></a>

								@endcan
								@can('carros-delete')
									{{ method_field('DELETE') }}
									{{ csrf_field() }}
									<button title="Deletar" class="btn red"><i class="material-icons">delete</i></button>
								@endcan
							</form>

						</td>
					</tr>
				@endforeach
				</tbody>
			</table>

		</div>
		<div class="row">
			@can('carros-create')
			<a class="btn blue" href="{{route('carros.galeria.edit',$carro)}}">Adicionar</a>
			@endcan
		</div>

		<div align="center" class="row">
			{{ $registros->links() }}
		</div>

	</div>

@endsection
