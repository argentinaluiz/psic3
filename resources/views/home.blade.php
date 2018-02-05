@extends('layouts.app')
@section('pag_title', 'Usuários')

@section('breadcrumb')
    <h2>Geral</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar chamados' => route('home')))!!}
@endsection

@section('h5-title')
     <h5>Lista de Chamados</h5>
@endsection


@section('content')
						
	@can('create', App\Models\Painel\Call::class )
		<a class="btn btn-sm btn-primary" href=""> Criar Chamados</a>
	@endcan
	<br><br>
	@forelse($calls as $key => $value)
		<p>{{ $value->title }} 
			@can('view', $value )
				@can('update', $value )
					<a href="/home/{{$value->id}}"> Editar</a>
				@endcan
				@can('delete', $value )
					<a href="/home/{{$value->id}}"> Deletar</a>
				@endcan
			@endcan
		</p>
	@empty
		<p>Não existem chamados!</p>
	@endforelse

@endsection
