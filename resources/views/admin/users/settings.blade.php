@extends('layouts.app')
@section('pag_title', 'Usuários - Configurações')

@section('breadcrumb')
    <h2>Configurações</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Configurações do usuário' ))!!}
@endsection

@section('h5-title')
     <h5>Editar meu perfil de usuário</h5>
@endsection

@section('content')
    {!!
    form($form->add('insert','submit', [
        'attr' => ['class' => 'btn btn-primary btn-block'],
        'label' => Icon::create('floppy-disk').'&nbsp;&nbsp;Salvar'
    ]))
    !!}
@endsection