@extends('layouts.app')

@section('breadcrumb')
    <h2>Configurações</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar papéis' => route('roles.index'), 'Novo papel' ))!!}
@endsection

@section('h5-title')
     <h5>Novo Papel</h5>
@endsection

@section('content')
	<form action="{{ route('roles.store') }}" method="post">

	{{csrf_field()}}
	@include('admin.role._form')

	<button class="btn btn-sm btn-default">Adicionar</button>
		
	</form>
@endsection