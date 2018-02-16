@extends('layouts.app')
@section('pag_title', 'Produto - Galeria')

@section('breadcrumb')
    <h2>Slides</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar slides' => route('slides.index'), 'Galeria' ))!!}
@endsection

@section('h5-title')
     <h5>Editar Galeria</h5>
@endsection

@section('content')
	<table class="table table-striped">
		<thead>
		<tr>
			<th>Imagem</th>
			<th>Título</th>
			<th>Descrição</th>
			<th>Link</th>
			<th>Ordem</th>
			<th>Ações</th>
		</tr>
		</thead>
		<tbody>
			<tr>
				<form action="{{ route('slides.update',$registro) }}" method="post">
				{{csrf_field()}}
				{{ method_field('PUT') }}
				<td><img width="50" src="{{ $registro->url }}"></td>
				<td><input type="text" name="title" class="form-control" value="{{ isset($registro->title) ? $registro->title : '' }}{{old('title')}}"></td>
				<td><input type="text" name="description" class="form-control" value="{{ isset($registro->description) ? $registro->description : '' }}{{old('description')}}"></td>
				<td><input type="text" name="link" class="form-control"  value="{{ isset($registro->link) ? $registro->link : '' }}{{old('link')}}"</td>
				<td><input type="text" name="order" class="form-control" value="{{ isset($registro->order) ? $registro->order : '' }}{{old('order')}}"</td>
				<td> <button class="btn btn-sm btn-default"><span class="glyphicon glyphicon-pencil"></span> Atualizar</a></button>  </td>
			</tr>
		</tbody>
	</table>
@endsection
