@extends('layouts.app')
@section('pag_title', 'Classes - Cadastrar')

@section('content')
    <div class="container">
        {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar classes' => route('class_informations.index'), 'Nova classe' ))!!}

        <div class="row">
            <div class="col-md-12">
                <h3>Nova classe</h3>
                <div class="cleaner_h25"></div>
                {!!
                form($form->add('insert','submit', [
                    'attr' => ['class' => 'btn btn-primary btn-block'],
                    'label' => Icon::create('floppy-disk').'&nbsp;&nbsp;Inserir'
                ]))
                !!}
            </div>
        </div>
    </div>
@endsection