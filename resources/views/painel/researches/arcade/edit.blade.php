@extends('layouts.app')
@section('pag_title', 'Pesquisa - Galeria')

@section('breadcrumb')
    <h2>Pesquisas</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar pesquisas' => route('researches.index'), 'Galeria' ))!!}
@endsection

@section('h5-title')
     <h5>Editar Galeria</h5>
@endsection

@section('content')
	<table class="table table-striped">
		<thead>
		<tr>
			<th>Documento</th>
			<th>Título</th>
			<th>Descrição</th>
			<th>URL</th>
			<th>Ordem</th>
			<th>Ações</th>
		</tr>
		</thead>
		<tbody>
			<tr>
				<form action="{{ route('researches.arcade.update',$registro) }}" method="post">
				{{csrf_field()}}
				{{ method_field('PUT') }}
				<td></td>
				<td><input type="text" name="title" class="form-control" value="{{ isset($registro->title) ? $registro->title : '' }}{{old('title')}}"></td>
				<td><input type="text" name="description" class="form-control" value="{{ isset($registro->description) ? $registro->description : '' }}{{old('description')}}"></td>
				<td><input type="text" name="url" class="form-control" disabled="" value="{{ isset($registro->url) ? $registro->url : '' }}{{old('url')}}"</td>
				<td><input type="text" name="order" class="form-control" value="{{ isset($registro->order) ? $registro->order : '' }}{{old('order')}}"</td>
				<td> <button class="btn btn-sm btn-default"><span class="glyphicon glyphicon-pencil"></span> Atualizar</a></button>  </td>

			</tr>
		</tbody>
	</table>
@endsection
