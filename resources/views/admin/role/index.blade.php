@extends('layouts.app')
@section('pag_title', 'Usuários')

@section('content')
	<div class="container">
		{!! Breadcrumb::withLinks(array('Home' => '/', 'Listar papéis' => route('roles.index')))!!}		
		<div class="row">
			<div class="col-md-12">
				<h3>Listagem de papéis</h3>
				<span class="pull-right small text-muted">Total de papéis: {{ $totalRoles }} </span>
				<br/>
				@can('role-create')
					<a class="btn btn-sm btn-primary" href="{{route('roles.create')}}">Adicionar</a>
				@endcan
				<div class="cleaner_h15"></div>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Id</th>
							<th>Nome</th>
							<th>Descrição</th>
							<th style="width: 250px;">Permissões</th>
							<th>Ações</th>
						</tr>
					</thead>
					<tbody>
					@foreach($registros as $registro)
						<tr>
							<td>{{ $registro->id }}</td>
							<td>{{ $registro->name }}</td>
							<td>{{ $registro->description }}</td>
							<td>@foreach($registro->permissions as $permission)
									{{ $permission->name }} ,
								@endforeach
							</td>
							<td>
								<form action="{{route('roles.destroy',$registro->id)}}" method="post">
									@can('role-edit')
										<a title="Editar" class="btn btn-sm btn-default" href="{{ route('roles.edit',$registro->id) }}">editar</a>
										<a title="Permissões" class="btn btn-sm btn-primary" href="{{route('roles.permission',$registro->id)}}">permissões</a>
									@endcan
									@can('role-delete')
										{{ method_field('DELETE') }}
										{{ csrf_field() }}
										<button title="Deletar" class="btn btn-sm btn-danger">excluir</button>
									@endcan
								</form>
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection
