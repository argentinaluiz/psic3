@extends('layouts.app')
@section('pag_title', 'Listagem de Clientes')

@section('breadcrumb')
    <h2>Configurações</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar clientes' => route('clients.index')))!!}
@endsection

@section('h5-title')
     <h5>Listagem de clientes</h5>
@endsection

@section('content')
	<ul class="nav nav-tabs">
		<span class="pull-right small text-muted">Total de clientes: {{ $totalClients }}</span>
		<li class="active"><a data-toggle="tab" href="#tab-1"><i class="fa fa-user" aria-hidden="true"></i> Pacientes</a></li>
		<li class=""><a data-toggle="tab" href="#tab-2"><i class="fa fa-briefcase" aria-hidden="true"></i> Psicanalistas</a></li>
		<li class=""><a data-toggle="tab" href="#tab-3"><i class="fa fa-wrench" aria-hidden="true"></i> Supervisores</a></li>
		<li class=""><a data-toggle="tab" href="#tab-4"><i class="fa fa-hospital-o" aria-hidden="true"></i> Clínicas</a></li>
	</ul>

	<div class="tab-content">
		<div id="tab-1" class="tab-pane active">
			<div class="cleaner_h25"></div>
			@can('clients-create')
				<a class="btn btn-default" href="{{ route('clients.create') }}">Criar novo</a>
			@endcan
			<span class="pull-right small text-muted">Total de pacientes: {{ $countPatients }}</span>
			<div class="cleaner_h25"></div>
			<div class="table-responsive">
				<table class="table table-striped dataTables-patients">
					<thead>
					<tr>
						<th>Nome</th>
						<th>CNPJ/CPF</th>
						<th>Data Nasc.</th>
						<th>E-mail</th>
						<th>Telefone</th>
						<th>Sexo</th>
						<th>Ação</th>
					</tr>
					</thead>
					<tbody>
					@foreach($patients as $patient)
						<tr>
							<td>{{ $patient->name }}</td>
							<td>{{ $patient->document_number_formatted }}</td>
							<td>{{ $patient->date_birth_formatted }}</td>
							<td>{{ $patient->email }}</td>
							<td>{{ $patient->phone }}</td>
							<td>{{ $patient->sex }}</td>
							<td>
								@can('clients-edit')
									<a href="{{route('clients.edit',['patient' => $patient->id])}}">Editar</a> |
								@endcan
								@can('clients-view')	
									<a href="{{route('clients.show',['patient' => $patient->id])}}">Ver</a>
								@endcan
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>
			</div>
		</div>
		<div id="tab-2" class="tab-pane">
			<div class="cleaner_h25"></div>
			@can('clients-create')
				<a class="btn btn-default" href="{{ route('clients.create') }}">Criar novo</a>
			@endcan
			<span class="pull-right small text-muted">Total de psicanalistas: {{ $countPsychoanalysts }}</span>
			<div class="cleaner_h25"></div>
			<div class="table-responsive">
					<table class="table table-striped dataTables-psychoanalysts">
					<thead>
					<tr>
						<th>Nome</th>
						<th>CNPJ/CPF</th>
						<th>Data Nasc.</th>
						<th>E-mail</th>
						<th>Telefone</th>
						<th>Sexo</th>
						<th>Ação</th>
					</tr>
					</thead>
					<tbody>
					@foreach($psychoanalysts as $psychoanalyst)
						<tr>
							<td>{{ $psychoanalyst->name }}</td>
							<td>{{ $psychoanalyst->document_number_formatted }}</td>
							<td>{{ $psychoanalyst->date_birth_formatted }}</td>
							<td>{{ $psychoanalyst->email }}</td>
							<td>{{ $psychoanalyst->phone }}</td>
							<td>{{ $psychoanalyst->sex }}</td>
							<td>
								@can('clients-edit')
									<a href="{{route('clients.edit',['psychoanalyst' => $psychoanalyst->id])}}">Editar</a> |
								@endcan
								@can('clients-view')
									<a href="{{route('clients.show',['psychoanalyst' => $psychoanalyst->id])}}">Ver</a>
								@endcan
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>
			</div>
		</div>
		<div id="tab-3" class="tab-pane">
			<div class="cleaner_h25"></div>
			@can('clients-create')
				<a class="btn btn-default" href="{{ route('clients.create') }}">Criar novo</a>
			@endcan
			<span class="pull-right small text-muted">Total de supervisores: {{ $countSupervisor }}</span>
			<div class="cleaner_h25"></div>
			<div class="table-responsive">
				<table class="table table-striped dataTables-psychoanalysts">
					<thead>
					<tr>
						<th>Nome</th>
						<th>CNPJ/CPF</th>
						<th>Data Nasc.</th>
						<th>E-mail</th>
						<th>Telefone</th>
						<th>Sexo</th>
						<th>Ação</th>
					</tr>
					</thead>
					<tbody>
					@foreach($supervisors as $supervisor)
						<tr>
							<td>{{ $supervisor->name }}</td>
							<td>{{ $supervisor->document_number_formatted }}</td>
							<td>{{ $supervisor->date_birth_formatted }}</td>
							<td>{{ $supervisor->email }}</td>
							<td>{{ $supervisor->phone }}</td>
							<td>{{ $supervisor->sex }}</td>
							<td>
								@can('clients-edit')
									<a href="{{route('clients.edit',['supervisor' => $supervisor->id])}}">Editar</a> |
								@endcan
								@can('clients-view')
									<a href="{{route('clients.show',['supervisor' => $supervisor->id])}}">Ver</a>
								@endcan
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>
			</div>
		</div>
		<div id="tab-4" class="tab-pane">
			<div class="cleaner_h25"></div>
			@can('clients-create')
				<a class="btn btn-default" href="{{ route('clients.create') }}">Criar novo</a>
			@endcan
			<span class="pull-right small text-muted">Total de clínicas: {{ $countClinics }}</span>
			<div class="cleaner_h25"></div>
			<div class="table-responsive">
				<table class="table table-striped dataTables-psychoanalysts">
					<thead>
					<tr>
						<th>Nome</th>
						<th>CNPJ/CPF</th>
						<th>Data Nasc.</th>
						<th>E-mail</th>
						<th>Telefone</th>
						<th>Sexo</th>
						<th>Ação</th>
					</tr>
					</thead>
					<tbody>
					@foreach($clinics as $clinic)
						<tr>
							<td>{{ $clinic->name }}</td>
							<td>{{ $clinic->document_number_formatted }}</td>
							<td>{{ $clinic->date_birth_formatted }}</td>
							<td>{{ $clinic->email }}</td>
							<td>{{ $clinic->phone }}</td>
							<td>{{ $clinic->sex }}</td>
							<td>
								@can('clients-edit')
									<a href="{{route('clients.edit',['clinic' => $clinic->id])}}">Editar</a> |
								@endcan
								@can('clients-view')	
									<a href="{{route('clients.show',['clinic' => $clinic->id])}}">Ver</a>
								@endcan
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="cleaner_h20"></div>

<script>$(document).ready(function () {
    $.noConflict();
		var table = $('.dataTables-patients').DataTable({
			pageLength: 10,
			responsive: true,
			dom: '<"html5buttons"B>lTfgitp',
			"language": {
				"lengthMenu": "Mostrando _MENU_ registros por página",
				"zeroRecords": "Nada encontrado",
				"info": "Mostrando _PAGE_ de _PAGES_",
				"infoEmpty": "Nenhum registro disponível",
				"infoFiltered": "(filtrado de _MAX_ registros no total)",
				"search":         "Busca:",
				"zeroRecords":    "Nenhum registro cadastrado",
				"paginate": {
					"first":      "Primeira",
					"last":       "Última",
					"next":       "Próxima",
					"previous":   "Anterior"
				},
				"aria": {
					"sortAscending":  ": ativa para ordenar de modo crescente",
					"sortDescending": ": ativa para ordenar de modo decrescente"
				}
			},
			buttons: [
				{extend: 'copy'},
				{extend: 'csv'},
				{extend: 'excel', title: 'ClientsFile'},
				{extend: 'pdf', title: 'ClientsFile'},

				{extend: 'print',
					customize: function (win){
						$(win.document.body).addClass('white-bg');
						$(win.document.body).css('font-size', '10px');
						$(win.document.body).find('table')
								.addClass('compact')
								.css('font-size', 'inherit');
				}
				}
			]
			
		});

		var table = $('.dataTables-psychoanalysts').DataTable({
			pageLength: 10,
			responsive: true,
			dom: '<"html5buttons"B>lTfgitp',
			"language": {
				"lengthMenu": "Mostrando _MENU_ registros por página",
				"zeroRecords": "Nada encontrado",
				"info": "Mostrando _PAGE_ de _PAGES_",
				"infoEmpty": "Nenhum registro disponível",
				"infoFiltered": "(filtrado de _MAX_ registros no total)",
				"search":         "Busca:",
				"zeroRecords":    "Nenhum registro cadastrado",
				"paginate": {
					"first":      "Primeira",
					"last":       "Última",
					"next":       "Próxima",
					"previous":   "Anterior"
				},
				"aria": {
					"sortAscending":  ": ativa para ordenar de modo crescente",
					"sortDescending": ": ativa para ordenar de modo decrescente"
				}
			},
			buttons: [
				{extend: 'copy'},
				{extend: 'csv'},
				{extend: 'excel', title: 'PsicanalistasFile'},
				{extend: 'pdf', title: 'PsicanalistasFile'},

				{extend: 'print',
					customize: function (win){
						$(win.document.body).addClass('white-bg');
						$(win.document.body).css('font-size', '10px');
						$(win.document.body).find('table')
								.addClass('compact')
								.css('font-size', 'inherit');
				}
				}
			]
			
		});
	});
</script>

@endsection



