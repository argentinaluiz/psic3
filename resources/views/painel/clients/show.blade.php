@extends('layouts.app')
@section('pag_title', 'Clientes - Mostrar')

@section('breadcrumb')
    <h2>Configurações</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar clientes' => route('clients.index'), 'Ver cliente'))!!}
@endsection

@section('h5-title')
     <h5>Ver cliente</h5>
@endsection

@section('content')
	@can('clients-edit')
		<a class="btn btn-sm btn-primary" href="{{ route('clients.edit',['client' => $client->id]) }}">Editar</a>
	@endcan	
	@can('clients-delete')	
		<a class="btn btn-sm btn-danger" href="{{ route('clients.destroy',['client' => $client->id]) }}"
			onclick="event.preventDefault();if(confirm('Deseja excluir este item?')){document.getElementById('form-delete').submit();}">Excluir</a>
		<!--<form id="form-delete"style="display: none" action="{{ route('clients.destroy',['client' => $client->id]) }}" method="post">-->
		{{Form::open(['route' => ['clients.destroy',$client->id],'method' => 'DELETE', 'id' => 'form-delete'])}}
		{{Form::close()}}
	@endcan
	<br/>
	<table class="table table-bordered">
		<tbody>
		<tr>
			<th scope="row">Nome</th>
			<td>{{$client->name}}</td>
		</tr>
		<tr>
			<th scope="row">Documento</th>
			<td>{{$client->document_number_formatted}}</td>
		</tr>
		<tr>
			<th scope="row">Área de atuação</th>
			<td>
				@switch($client->expertise)
					@case(1)
						Paciente
						@break

					@case(2)
						Psicanalista
						@break

					@case(3)
						Supervisor
						@break
				@endswitch
			</td>
		</tr>
		<tr>
			<th scope="row">E-mail</th>
			<td>{{$client->email}}</td>
		</tr>
		<tr>
			<th scope="row">Telefone</th>
			<td>{{$client->phone}}</td>
		</tr>
		<tr>
			<th scope="row">Estado Civil</th>
			<td>
				@switch($client->marital_status)
					@case(1)
						Solteiro
						@break

					@case(2)
						Casado
						@break

					@case(3)
						Divorciado
						@break
					@case(4)
						Clínica
						@break
				@endswitch
			</td>
		</tr>
		<tr>
			<th scope="row">Data Nasc.</th>
			<td>{{$client->date_birth_formatted}}</td>
		</tr>
		<tr>
			<th scope="row">Sexo</th>
			<td>{{$client->sex_formatted }}</td>
		</tr>
		<tr>
			<th scope="row">Def. Física</th>
			<td>{{$client->physical_disability}}</td>
		</tr>
		<tr>
			<th scope="row">Inadimplente</th>
			<td>{{$client->defaulter?'Sim': 'Não'}}</td>
		</tr>
		</tbody>
	</table>

@endsection