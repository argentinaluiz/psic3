@extends('layouts.app')

@section('content')
    <div class="container">
        {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar especialidades' => route('specialties.index'), 'Nova especialidade' ))!!}
        <div class="row">
            <div class="col-md-12">
                <h3>Nova especialidade</h3>
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