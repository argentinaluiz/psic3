@extends('layouts.app')
@section('pag_title', 'Produtos')

@section('breadcrumb')
    <h2>Produtos</h2>
     {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar produtos' => route('products.index') ))!!}
@endsection

@section('h5-title')
     <h5>Listagem de produtos</h5>
@endsection


@section('content')
	<span class="pull-right small text-muted">Total de produtos: {{ $totalProducts}}</span>
	<br/>
	@can('products-create')
		<a class="btn btn-sm btn-primary" href="{{route('products.create') }}"><span class="glyphicon glyphicon-plus"></span> Criar novo</a>
	@endcan
	<div class="cleaner_h15"></div>
	 {!!
    Table::withContents($products->items())
    ->striped()
    ->callback('Ações', function($field,$model){
		$linkGallery = route('products.gallery',['product' => $model->id]);
        $linkEdit = route('products.edit',['product' => $model->id]);
        $linkShow = route('products.show',['product' => $model->id]);
        
        return Button::link(Icon::create('picture').' Imagens')->asLinkTo($linkGallery).'&nbsp;&nbsp'.'|'.
            Button::link(Icon::create('pencil').' Editar')->asLinkTo($linkEdit).'&nbsp;&nbsp'.'|'.
            Button::link(Icon::create('folder-open').'&nbsp;&nbsp;Ver')->asLinkTo($linkShow);
    })
    !!}
    <div class="cleaner_h15"></div>
    {!! $products->links() !!}

@endsection
