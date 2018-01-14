@extends('layouts.app')
@section('pag_title', 'Produto - Editar')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Editar produto</h3>
            @include('form._form_errors')
            {{ Form::model($product,['route' => ['products.update',$product->id], 'class' => 'form form-search form-ds', 'files' => true, 'method' => 'PUT' ]) }}
                @include('painel.products._form')
                <button type="submit" class="btn btn-sm btn-default">Salvar</button>
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection