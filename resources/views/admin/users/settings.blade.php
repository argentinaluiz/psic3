@extends('layouts.app')
@section('pag_title', 'Usuários - Configurações')

@section('content')
    <div class="container">
         {!! Breadcrumb::withLinks(array('Home' => '/', 'Configurações do usuário' ))!!}
        <div class="row">
            <div class="col-md-12">
                <h3>Editar meu perfil de usuário</h3>
                <div class="cleaner_h25"></div>
                {!!
                form($form->add('insert','submit', [
                    'attr' => ['class' => 'btn btn-primary btn-block'],
                    'label' => Icon::create('floppy-disk').'&nbsp;&nbsp;Salvar'
                ]))
                !!}
            </div>
        </div>
    </div>
@endsection