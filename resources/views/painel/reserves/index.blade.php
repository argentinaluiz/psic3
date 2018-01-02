@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Reservas</h3>
            <span class="pull-right small text-muted">Total de reservas: {{ $totalReserves }}</span>
            <br/>
            <a class="btn btn-default" href="{{route('reserves.create') }}">Nova reserva</a>
            <table class="table table-striped dataTables-reserves">
                <thead>
                <tr>
                    <th>Paciente</th>
                    <th>Agenda</th>
                    <th>Data reservada</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($reserves as $reserve)
                    <tr>
                        <td>{{ $reserve->client->name }}</td>
                        <td>{{ $reserve->agenda->id }} </td>
                        <td>({{ formatDateAndTime($reserve->date_reserved) }})</td>
                        <td>
							@switch($reserve->status)
								@case(1)
									Reservado
									@break
								@case(2)
									Cancelado
									@break
								@case(3)
									Pago
									@break								
								@case(4)
									Aguardando
									@break
							@endswitch
						</td>
                        <td>
                            
                            <a href="{{route('reserves.edit',['reserve' => $reserve->id])}}">Editar</a> |
                            <a href="{{route('reserves.show',['reserve' => $reserve->id])}}">Ver</a>
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
		var table = $('.dataTables-reserves').DataTable({
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
				{extend: 'excel', title: 'ReservasFile'},
				{extend: 'pdf', title: 'ReservasFile'},

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