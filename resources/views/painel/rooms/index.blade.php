@extends('layouts.app')
@section('pag_title', 'Salas')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Listagem das salas</h3>
			<div class="cleaner_h25"></div>
            <span class="pull-right small text-muted">Total de salas: {{ $totalRooms }}</span>
            <br/>
            <a class="btn btn-default" href="{{route('rooms.create') }}">Criar nova</a>
			<div class="cleaner_h15"></div>
            <table class="table table-striped dataTables-rooms">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Clínica</th>
                    <th>Classe</th>
                    <th>Total de Pacientes</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($rooms as $room)
                    <tr>
                        <td>{{ $room->id }}</td>
                        <td>{{ $room->client->name }}</td>
                        <td>
							@switch($room->class_room)
								@case(1)
									Online
									@break
								@case(2)
									Casal
									@break
								@case(3)
									Divã
									@break								
								@case(4)
									Criança
									@break
                                @case(5)
                                    Padrão
                                    @break
							@endswitch
						</td>
                        <td>{{ $room->qty_pacients }}</td>
                        <td>
                            
                            <a href="{{route('rooms.edit',['room' => $room->id])}}">Editar</a> |
                            <a href="{{route('rooms.show',['room' => $room->id])}}">Ver</a>
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
		var table = $('.dataTables-rooms').DataTable({
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
				{extend: 'excel', title: 'SalasFile'},
				{extend: 'pdf', title: 'SalasFile'},

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