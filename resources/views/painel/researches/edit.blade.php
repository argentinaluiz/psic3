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
		<div class="col-md-12">
            <div class="cleaner_h25"></div>
            <?php $icon = Icon::create('pencil');?>
            {!!
                form($form->add('salve', 'submit', [
                    'attr' => ['class' => 'btn btn-primary btn-block'],
                    'label' => $icon.'&nbsp;&nbsp;Salvar'
                ]))
            !!}
        </div>
	@endcomponent
@endsection