@extends('layouts.app')
@section('pag_title', 'Papéis')

@section('breadcrumb')
    <h2>Configurações</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar papéis' => route('roles.index')))!!}	
@endsection

@section('h5-title')
     <h5>Listagem de papéis</h5>
@endsection


@section('content')
	<span class="pull-right small text-muted">Total de papéis: {{ $totalRoles }} </span>
	<br/>
	@can('role-create')
		<a class="btn btn-sm btn-primary" href="{{route('roles.create')}}"><span class="glyphicon glyphicon-plus"></span> Adicionar</a>
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
							<a title="Editar"  href="{{ route('roles.edit',$registro->id) }}"><span class="glyphicon glyphicon-pencil"></span> Editar</a> |
							<a title="Permissões" class="btn btn-sm btn-primary" href="{{route('roles.permission',$registro->id)}}">permissões</a>
						@endcan
						@can('role-delete')
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
@endsection
