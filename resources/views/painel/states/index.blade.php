@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Listagem dos estados</h3>
            <div class="cleaner_h25"></div>
            <span class="pull-right small text-muted">Total de estados: {{ $totalStates }} </span>
            <div class="cleaner_h15"></div>
            <table class="table table-striped dataTables-states">
                <thead>
                <tr>
                    <th>Estado</th>
                    <th>Sigla</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($states as $state)
                    <tr>
                        <td>{{ $state->state }}</td>
                        <td>{{ $state->sigla }}</td>
                        <td>
                            <a href="{{route('state.cities', $state->sigla)}}"><i class="fa fa-map-marker" aria-hidden="true"></i> Cidades</a> 
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
		var table = $('.dataTables-states').DataTable({
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
				{extend: 'excel', title: 'EstadosFile'},
				{extend: 'pdf', title: 'EstadosFile'},

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