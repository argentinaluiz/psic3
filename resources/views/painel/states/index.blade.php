@extends('layouts.app')
@section('pag_title', 'Estados')

@section('breadcrumb')
    <h2>Configurações</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar estados' => route('states.index')))!!}
@endsection

@section('h5-title')
     <h5>Listagem dos estados</h5>
@endsection


@section('content')
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

@endsection