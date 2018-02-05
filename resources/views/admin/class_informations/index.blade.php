@extends('layouts.app')
@section('pag_title', 'Classes')

@section('breadcrumb')
    <h2>Configurações</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar classes' => route('class_informations.index')))!!}
@endsection

@section('h5-title')
     <h5>Listagem de classes</h5>
@endsection

@section('content')
    {!! Button::primary(Icon::create('plus').' Nova classe')->asLinkTo(route('class_informations.create')) !!}
    <div class="cleaner_h15"></div>

    {!!
    Table::withContents($class_informations->items())
    ->striped()
    ->callback('Ações', function($field,$model){
        $linkEdit = route('class_informations.edit',['class_information' => $model->id]);
        $linkShow = route('class_informations.show',['class_information' => $model->id]);
        $linkPatients = route('class_informations.patients.index',['class_information' => $model->id]);
        $linkSessions = route('class_informations.sessions.index',['class_information' => $model->id]);
        return Button::link(Icon::create('pencil').' Editar')->asLinkTo($linkEdit).'|'.
            Button::link(Icon::create('folder-open').'&nbsp;&nbsp;Ver')->asLinkTo($linkShow).'|'.
            Button::link(Icon::create('home').'&nbsp;&nbsp;Pacientes')->asLinkTo($linkPatients).'|'.
            Button::link(Icon::create('blackboard').'&nbsp;&nbsp;Sessão')->asLinkTo($linkSessions);
    })
    !!}
    <div class="cleaner_h15"></div>
    {!! $class_informations->links() !!}
@endsection