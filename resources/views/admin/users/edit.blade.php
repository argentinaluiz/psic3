@extends('layouts.app')
@section('pag_title', 'Usuários - Editar')

@section('breadcrumb')
    <h2>Configurações</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar usuários' => route('users.index'), 'Editar usuário' ))!!}
@endsection

@section('h5-title')
     <h5>Editar usuário</h5>
@endsection

@section('content')
    @component('admin.users.tabs-component',['user' => $form->getModel()])
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