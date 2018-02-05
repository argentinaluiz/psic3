@extends('layouts.app')
@section('pag_title', 'Usuários - Cadastrar')

@section('breadcrumb')
    <h2>Configurações</h2>
     {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar usuários' => route('users.index'), 'Novo usuário' ))!!}
@endsection

@section('h5-title')
     <h5>Novo usuário</h5>
@endsection

@section('content')

    {!!
    form($form->add('insert','submit', [
        'attr'  => ['class' => 'btn btn-primary btn-block'],
        'label' => Icon::create('floppy-disk').'&nbsp;&nbsp;Inserir'
    ]))
    !!}

@endsection