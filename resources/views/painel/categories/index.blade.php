@extends('layouts.app')
@section('pag_title', 'Categorias')

@section('breadcrumb')
    <h2>Pesquisas</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar categorias' => route('categories.index')))!!}
@endsection

@section('h5-title')
     <h5>Listagem de categorias</h5>
@endsection


@section('content')
    <span class="pull-right small text-muted">Total de categorias: {{ $totalCategories }} </span>
    <br/>
    {!! Button::primary(Icon::create('plus').' Nova categoria')->asLinkTo(route('categories.create')) !!}
    <div class="cleaner_h15"></div>
        {!!
        Table::withContents($categories->items())
        ->striped()
        ->callback('Ações', function($field,$model){
            $linkEdit = route('categories.edit',['category' => $model->id]);
            $linkShow = route('categories.show',['category' => $model->id]);
            return Button::link(Icon::create('pencil').' Editar')->asLinkTo($linkEdit).'&nbsp;&nbsp'.'|'.
                   Button::link(Icon::create('folder-open').'&nbsp;&nbsp;Ver')->asLinkTo($linkShow);
        })
        !!}
    <div class="cleaner_h15"></div>
    {!! $categories->links() !!}

@endsection