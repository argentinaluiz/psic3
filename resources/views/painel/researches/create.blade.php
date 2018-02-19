@extends('layouts.app')
@section('pag_title', 'Pesquisa - Cadastrar')

@section('breadcrumb')
    <h2>Pesquisas</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar pesquisas' => route('researches.index'), 'Nova pesquisa' ))!!}
@endsection

@section('h5-title')
     <h5>Nova pesquisa</h5>
@endsection
 
@section('content')
    {!!
    form($form->add('insert','submit', [
        'attr'  => ['class' => 'btn btn-primary btn-block'],
        'label' => Icon::create('floppy-disk').'&nbsp;&nbsp;Inserir'
    ]))
    !!}
    
@endsection
