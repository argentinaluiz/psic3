@extends('layouts.app')
@section('pag_title', 'Especialidade - adicionar')

@section('content')
    <div class="container">
        {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar classes' => route('class_informations.index'), 'Nova especialidade e psicanalista' ))!!}
        <div class="row">
            <div class="col-md-12">
                <h3>Adicionar especialidade e psicanalista na classe</h3>
                <div class="cleaner_h25"></div>
                <class-session class-information="{{$class_information->id}}"></class-session>
                <br/><br/>
            </div>
        </div>
    </div>
@endsection