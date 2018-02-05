@extends('layouts.app')
@section('pag_title', 'Classes - Pacientes')

@section('breadcrumb')
    <h2>Configurações</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar classes' => route('class_informations.index'), 'administração de pacientes' ))!!}
@endsection

@section('h5-title')
     <h5>Administração de pacientes na classe</h5>
@endsection

@section('content')
    <!-- Componente Vue.js -->
    <class-pacient class-information="{{$class_information->id}}"></class-pacient>
@endsection