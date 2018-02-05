@extends('layouts.app')
@section('pag_title', 'Especialidade - Editar')

@section('breadcrumb')
    <h2>Configurações</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar especialidades' => route('specialties.index'), 'Editar especialidade' ))!!}
@endsection

@section('h5-title')
     <h5>Editar especialidade</h5>
@endsection

@section('content')

    {!!
    form($form->add('edit','submit', [
        'attr' => ['class' => 'btn btn-primary btn-block'],
        'label' => Icon::create('floppy-disk').'&nbsp;&nbsp;Salvar'
    ]))
    !!}

@endsection