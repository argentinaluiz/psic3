@extends('layouts.app')
@section('pag_title', 'Permissões')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Listagem das permissões</h3>
            <div class="cleaner_h25"></div>
            <span class="pull-right small text-muted">Total de permissões: {{ $totalPermissions}}</span>
            <br/>
            <a class="btn btn-default" href="{{route('permissions.create') }}">Criar nova</a>
            <div class="cleaner_h15"></div>
            <table class="table table-striped dataTables-permissions">
                <thead>
                <tr>
                    <th>Permissões:Papéis</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
		
				@foreach($permissions as $permission)
                    <tr>
                        <td>{{ $permission->name }}:</b>
							@foreach ($permission->roles as $role)
								{{ $role->name }} <br>
							@endforeach
						</td>
                        <td>
                            <a href="{{route('permissions.edit',['permission' => $permission->id])}}">Editar</a> |
                            <a href="{{route('permissions.show',['permission' => $permission->id])}}">Ver</a>
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
		var table = $('.dataTables-permissions').DataTable({
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
				{extend: 'excel', title: 'PermissõesFile'},
				{extend: 'pdf', title: 'PermissõesFile'},

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