@extends('layouts.app')
@section('pag_title', 'Novo papel - Editar')

@section('breadcrumb')
    <h2>Configurações</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar papéis' => route('roles.index'), 'Editar papel' ))!!}
@endsection

@section('h5-title')
     <h5>Editar Papel</h5>
@endsection


@section('content')
	{{ Form::model($registro,['route' => ['roles.update', $registro->id ], 'method' => 'PUT' ]) }}
		@include('admin.role._form')
		<button type="submit" class="btn btn-sm btn-default">Salvar</button>
	{{ Form::close() }}
@endsection