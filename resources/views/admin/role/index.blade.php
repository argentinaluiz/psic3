@extends('layouts.app')
@section('pag_title', 'Usuários')

@section('content')
	<div class="container">

		@include('admin._breadcrumb')
		<div class="row">
			<div class="col-md-12">
				<h3>Listagem de papéis</h3>
				<div class="cleaner_h25"></div>
				<span class="pull-right small text-muted">Total de usuários: {{ $totalRoles }} </span>
				<br/>
				<a class="btn btn-sm btn-primary" href="{{route('roles.create')}}">Adicionar</a>
				<div class="cleaner_h15"></div>
				<table class="table table-striped dataTables-users">
					<thead>
						<tr>
							<th>Id</th>
							<th>Nome</th>
							<th>Descrição</th>
							<th>Permissões</th>
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
								<a title="Editar" class="btn btn-sm btn-default" href="{{ route('roles.edit',$registro->id) }}">editar</a>
								<a title="Permissões" class="btn btn-sm btn-primary" href="{{route('roles.permission',$registro->id)}}">permissões</a>


									{{ method_field('DELETE') }}
									{{ csrf_field() }}
									<button title="Deletar" class="btn btn-sm btn-danger">deletar</button>
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
