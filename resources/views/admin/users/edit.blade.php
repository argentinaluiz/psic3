@extends('layouts.app')
@section('pag_title', 'Usuários - Editar')

@section('content')
<div class="container">
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar usuários' => route('users.index'), 'Editar usuário' ))!!}
    <div class="row">
        <div class="col-md-12">
            <h3>Editar Usuário</h3>
            <div class="cleaner_h25"></div>
            {!!
            form($form->add('edit','submit', [
                'attr' => ['class' => 'btn btn-primary btn-block'],
                'label' => Icon::create('floppy-disk').'&nbsp;&nbsp;Salvar alterações'
            ]))
            !!}
        </div>
    </div>
</div>
@endsection