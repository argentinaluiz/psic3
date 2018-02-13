@extends('layouts.app')
@section('pag_title', 'Produto - Editar')

@section('breadcrumb')
    <h2>Produtos</h2>
     {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar produtos' => route('products.index'), 'Editar produto' ))!!}
@endsection

@section('h5-title')
     <h5>Editar produto</h5>
@endsection

@section('content')
     @component('painel.products.tabs-component',['product' => $form->getModel()])
        <div class="col-md-12">
            <div class="cleaner_h25"></div>
            <?php $icon = Icon::create('pencil');?>
            {!!
                form($form->add('salve', 'submit', [
                    'attr' => ['class' => 'btn btn-primary btn-block'],
                    'label' => $icon.'&nbsp;&nbsp;Salvar'
                ]))
            !!}
        </div>
    @endcomponent
@endsection