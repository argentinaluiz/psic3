@extends('layouts.app')
@section('pag_title', 'Categoria - Editar')

@section('breadcrumb')
    <h2>Pesquisas</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar categorias' => route('categories.index'), 'Editar categoria' ))!!}
@endsection

@section('h5-title')
     <h5>Editar categoria</h5>
@endsection

@section('content')

    {!!
    form($form->add('edit','submit', [
        'attr' => ['class' => 'btn btn-primary btn-block'],
        'label' => Icon::create('floppy-disk').'&nbsp;&nbsp;Salvar'
    ]))
    !!}

@endsection