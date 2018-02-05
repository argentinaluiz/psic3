@extends('layouts.app')
@section('pag_title', 'Lista de Permissões')

@section('breadcrumb')
    <h2>Configurações</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar papéis' => route('roles.index'), 'Permissões' ))!!}
@endsection

@section('h5-title')
     <h5>Lista de Permissões para {{$role->name}}</h5>
@endsection

@section('content')
	<form action="{{route('roles.permission.store',$role->id)}}" method="post">
	{{ csrf_field() }}
	<div class="input-field">
			<div class="cleaner_h20"></div>
		
		<label>Permissões</label><br/>
		<select name="permission_id">
			@foreach($permission as $value)
				<option value="{{$value->id}}">{{$value->name}}</option>
			@endforeach
		</select>
	</div>
		<div class="cleaner_h25"></div>
		<button class="btn btn-sm btn-primary">Adicionar</button>
	</form>

	<div class="row">
		<div class="col-md-12">
			<table class="table table-striped dataTables-users">
				<thead>
					<tr>
						<th>Permissão</th>
						<th>Descrição</th>
						<th>Ação</th>
					</tr>
				</thead>
				<tbody>
				@foreach($role->permissions as $permission)
					<tr>
						<td>{{ $permission->name }}</td>
						<td>{{ $permission->description }}</td>
						<td>
							<form action="{{route('roles.permission.destroy',[$role->id,$permission->id])}}" method="post">
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
	<div class="cleaner_h25"></div>
@endsection
