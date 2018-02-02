@extends('layouts.app')
@section('pag_title', 'Classes - Editar')

@section('content')
    <div class="container">
        {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar classes' => route('class_informations.index'), 'Editar classe' ))!!}
        <div class="row">
            <div class="col-md-12">
                <h3>Editar classe</h3>
                <div class="cleaner_h25"></div>
                {!!
                form($form->add('edit','submit', [
                    'attr' => ['class' => 'btn btn-primary btn-block'],
                    'label' => Icon::create('floppy-disk').'&nbsp;&nbsp;Salvar'
                ]))
                !!}
            </div>
        </div>
    </div>
@endsection