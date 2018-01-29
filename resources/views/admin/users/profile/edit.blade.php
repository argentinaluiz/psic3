@extends('layouts.app')
@section('pag_title', 'Usuários - Editar Perfil')

@section('content')
    <div class="container">
        {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar usuários' => route('users.index'), 'Editar perfil usuário' ))!!}
        <div class="row">
            <div class="col-md-12">
                @component('admin.users.tabs-component',['user' => $form->getModel()])
                    <div class="col-md-12">
                        <h3>Editar perfil</h3>
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
            </div> 
        </div>
    </div>
@endsection
