@extends('layouts.app')
@section('pag_title', 'Produto - Cadastrar')

@section('breadcrumb')
    <h2>Produtos</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar produtos' => route('products.index'), 'Novo produto' ))!!}
@endsection

@section('h5-title')
     <h5>Novo produto</h5>
@endsection
 
@section('content')
    {!!
    form($form->add('insert','submit', [
        'attr'  => ['class' => 'btn btn-primary btn-block'],
        'label' => Icon::create('floppy-disk').'&nbsp;&nbsp;Inserir'
    ]))
    !!}
    
@endsection