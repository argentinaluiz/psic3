@extends('layouts.app')
@section('pag_title', 'Especialidades')

@section('breadcrumb')
    <h2>Configurações</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar especialidades' => route('specialties.index')))!!}
@endsection

@section('h5-title')
     <h5>Listagem de especialidades</h5>
@endsection


@section('content')
    <span class="pull-right small text-muted">Total de especialidades: {{ $totalSpecialties }} </span>
    <br/>
    {!! Button::primary(Icon::create('plus').' Nova especialidade')->asLinkTo(route('specialties.create')) !!}
    <div class="cleaner_h15"></div>
        {!!
        Table::withContents($specialties->items())
        ->striped()
        ->callback('Ações', function($field,$model){
            $linkEdit = route('specialties.edit',['subject' => $model->id]);
            $linkShow = route('specialties.show',['subject' => $model->id]);
            return Button::link(Icon::create('pencil').' Editar')->asLinkTo($linkEdit).'|'.
                Button::link(Icon::create('folder-open').'&nbsp;&nbsp;Ver')->asLinkTo($linkShow);
        })
        !!}
    <div class="cleaner_h15"></div>
    {!! $specialties->links() !!}

@endsection