@extends('layouts.app')
@section('pag_title', 'Pesquisas - Cadastrar')

@section('breadcrumb')
    <h2>Pesquisas</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar pesquisas' => route('researches.index'), 'Editar Pesquisa' ))!!}
@endsection

@section('h5-title')
     <h5>Editar pesquisa</h5>
@endsection

@section('content')
    @include('form._form_errors')	

		<div class="row">
			<div class="col-sm-12">
				 {{ Form::model($search,['route' => ['researches.update',$researches->registro], 'class' => 'form form-search form-ds', 'files' => true, 'method' => 'PUT' ]) }}
							@include('painel.researches._form')
							<button class="btn btn-primary btn-block" type="submit"><span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp;Atualizar</button>
					{{ Form::close() }}
			</div>
		</div>
@endsection
