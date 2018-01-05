@extends('layouts.app')
@section('pag_title', 'Agendas')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Agendas</h3>
            <div class="cleaner_h25"></div>

            <span class="pull-right small text-muted">Total de agendamentos: {{ $totalAgendas }}</span>
            <a class="btn btn-default" href="{{route('agendas.create') }}">Cadastrar</a>
            <div class="cleaner_h15"></div>
            <table class="table table-striped dataTables-agendas">
                <thead>
                <tr>
                    <th>Clínica</th>
                    <th>Sala</th>
                    <th>Psicanalista</th>
                    <th>Número de sessões</th>
                    <th>Data</th>
                    <th>Horário</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($agendas as $agenda)
                    <tr>
                        <td>{{ $agenda->clinic->name}}</td>
                        <td>{{ $agenda->room->name}}</td>
                        <td>{{ $agenda->psychoanalyst->name}}</td>
                        <td>{{ $agenda->qty_sessions}}</td>
                        <td>{{formatDateAndTime($agenda->date)}}</td>
                        <td>{{formatDateAndTime($agenda->time, 'H:i')}}</td>
                        <td>
                            <a href="{{route('agendas.edit',['agenda' => $agenda->id])}}">Editar</a> |
                            <a href="{{route('agendas.show',['agenda' => $agenda->id])}}">Ver</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>$(document).ready(function () {
    $.noConflict();
		var table = $('.dataTables-agendas').DataTable({
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
				{extend: 'excel', title: 'AgendasFile'},
				{extend: 'pdf', title: 'AgendasFile'},

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