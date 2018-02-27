@extends('layouts.app')
@section('pag_title', 'Pesquisas - Cadastrar')

@section('breadcrumb')
    <h2>Pesquisas</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar pesquisas' => route('researches.index') ))!!}
@endsection

@section('h5-title')
     <h5>Listagem de Pesquisas</h5>
@endsection

@section('content')
	<span class="pull-right small text-muted">Total de pesquisas: {{ $totalResearches}}</span>
	<br/>
	@can('researches-create')
		<a class="btn btn-sm btn-primary" href="{{route('researches.create') }}"><span class="glyphicon glyphicon-plus"></span> Criar nova</a>
	@endcan
	<div class="cleaner_h15"></div>
	<table class="table table-striped dataTables-products">
		<thead>
		<tr>
			<th>Id</th>
			<th>Imagem</th>
            <th>Título</th>
			<th>Ano</th>
			<th>Descrição</th>
			<th>Categorias</th>
			<th>Ativo?</th>
			<th>Ações</th>
		</tr>
		</thead>
		<tbody>
			@foreach($researches as $research)
				<tr>
					<td>{{ $research->id }}</td>
					<td>
						
							<img class="img-responsive" src="{{url("storage/research/{$research->image}")}}" alt="{{$research->id}}" style="max-width: 50px;">
						
					</td>
                    <td>{{ $research->title }}</td>
					<td>{{ $research->year }}</td>
					<td>{{ $research->description }}</td>
					<td>{{ $research->TextCategories }}</td>
					<td>{{$research->active?'Sim': 'Não'}}</td>
					<td>
						<a href="{{route('researches.category',['research' => $research->id])}}"><span class="glyphicon glyphicon-tags"></span> Categorias</a> |
						<a href="{{route('researches.arcade',['research' => $research->id])}}"><span class="glyphicon glyphicon-book"></span> Documentos</a> |
						<a href="{{route('researches.edit',['research' => $research->id])}}"><span class="glyphicon glyphicon-pencil"></span> Editar</a> |
						<a href="{{route('researches.show',['research' => $research->id])}}"><span class="glyphicon glyphicon-folder-open"></span> Ver</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	<div class="cleaner_h15"></div>
    {!! $researches->links() !!}

@endsection
