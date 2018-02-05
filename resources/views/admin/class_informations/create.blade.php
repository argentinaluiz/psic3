@extends('layouts.app')
@section('pag_title', 'Classes - Cadastrar')

@section('breadcrumb')
    <h2>Configurações</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar classes' => route('class_informations.index'), 'Nova classe' ))!!}
@endsection

@section('h5-title')
     <h5>Nova classe</h5>
@endsection


@section('content')

    {!!
    form($form->add('insert','submit', [
        'attr' => ['class' => 'btn btn-primary btn-block'],
        'label' => Icon::create('floppy-disk').'&nbsp;&nbsp;Inserir'
    ]))
    !!}

@endsection