@extends('layouts.app')
@section('pag_title', 'Classes - Pacientes')

@section('content')
    <div class="container">
        {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar classes' => route('class_informations.index'), 'administração de pacientes' ))!!}
        <div class="row">
            <div class="col-md-12">
                <h3>Administração de pacientes</h3>
                <div class="cleaner_h25"></div>
                <class-pacient class-information="{{$class_information->id}}"></class-pacient>
            </div>
        </div>
    </div>
@endsection