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
	 {!!
    Table::withContents($researches->items())
    ->striped()
    ->callback('Ações', function($field,$model){
		$linkCategory = route('researches.category',['research' => $model->id]);
        $linkEdit = route('researches.edit',['research' => $model->id]);
        $linkShow = route('researches.show',['research' => $model->id]);
        
        return 
			Button::link(Icon::create('certificate').' Categorias')->asLinkTo($linkCategory).'&nbsp;&nbsp'.'|'.
            Button::link(Icon::create('pencil').' Editar')->asLinkTo($linkEdit).'&nbsp;&nbsp'.'|'.
            Button::link(Icon::create('folder-open').'&nbsp;&nbsp;Ver')->asLinkTo($linkShow);
    })
    !!}
	<div class="cleaner_h15"></div>
    {!! $researches->links() !!}

@endsection
