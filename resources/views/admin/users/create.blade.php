@extends('layouts.app')
@section('pag_title', 'Usuários - Cadastrar')

@section('content')
<div class="container">

     {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar usuários' => route('users.index'), 'Novo usuário' ))!!}

    <div class="row">
        <div class="col-md-12">
            <h3>Novo usuário</h3>
            <div class="cleaner_h25"></div>
            {!!
            form($form->add('insert','submit', [
                'attr'  => ['class' => 'btn btn-primary btn-block'],
                'label' => Icon::create('floppy-disk').'&nbsp;&nbsp;Inserir'
            ]))
            !!}
        </div>
    </div>
</div>
@endsection