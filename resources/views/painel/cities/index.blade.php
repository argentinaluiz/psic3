@extends('layouts.app')

@section('breadcrumb')
    <h2>Configurações</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar estados' => route('states.index'), 'Cidades'))!!}
@endsection

@section('h5-title')
     <h5>Cidades do Estado: <strong>{{$state->name}} </strong> - {{$cities->count()}}</h5>
@endsection

@section('content')
	<span class="pull-right small text-muted">Total geral de cidades: {{ $totalCities }} </span>
	<div class="cleaner_h15"></div>
	<table class="table table-striped dataTables-cities">
		<thead>
		<tr>
			<th>Nome</th>
			<th>Ações</th>
		</tr>
		</thead>
		<tbody>
		@foreach($cities as $city)
			<tr>
				<td>{{ $city->name }}</td>
				
				<td>
					<a href="">######</a> 
				</td>
			</tr>
		@endforeach
		</tbody>
	</table>
    

@endsection