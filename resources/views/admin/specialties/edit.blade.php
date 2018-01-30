@extends('layouts.app')
@section('pag_title', 'Especialidade - Editar')

@section('content')
    <div class="container">
        {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar especialidades' => route('specialties.index'), 'Editar especialidade' ))!!}
        <div class="row">
            <div class="col-md-12">
                <h3>Editar especialidade</h3>
                <div class="cleaner_h25"></div>
                {!!
                form($form->add('edit','submit', [
                    'attr' => ['class' => 'btn btn-primary btn-block'],
                    'label' => Icon::create('floppy-disk').'&nbsp;&nbsp;Editar'
                ]))
                !!}
             </div>
        </div>
    </div>
@endsection