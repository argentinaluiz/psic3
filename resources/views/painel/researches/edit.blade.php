@extends('layouts.app')
@section('pag_title', 'Pesquisa - Editar')

@section('breadcrumb')
    <h2>Pesquisas</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar pesquisas' => route('researches.index'), 'Editar pesquisa' ))!!}
@endsection

@section('h5-title')
     <h5>Editar pesquisa</h5>
@endsection

@section('content')
	@component('painel.researches.tabs-component',['research' => $form->getModel()])
		@include('form._form_errors')
        {{ Form::model($research,['route' => ['researches.update',$research->id], 'class' => 'form form-search form-ds', 'files' => true, 'method' => 'PUT' ]) }}
            @include('painel.researches._form')
            <button class="btn btn-primary btn-block" type="submit"><span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp;Salvar</button>
        {{ Form::close() }}
	@endcomponent
@endsection