@extends('layouts.app')
@section('pag_title', 'Produto - Mostrar')

@section('breadcrumb')
    <h2>Produtos</h2>
     {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar produtos' => route('painel.products.index'), 'Ver Produto' ))!!}
@endsection

@section('h5-title')
     <h5>Ver Produto</h5>
@endsection

@section('content')
    <a class="btn btn-sm btn-primary" href="{{ route('products.edit',['product' => $product->id]) }}"><span class="glyphicon glyphicon-pencil"></span> Editar</a>
    <a class="btn btn-sm btn-danger" href="{{ route('products.destroy',['product' => $product->id]) }}"
        onclick="event.preventDefault();if(confirm('Deseja excluir este item?')){document.getElementById('form-delete').submit();}"><span class="glyphicon glyphicon-remove"></span> Excluir</a>
    
    {{Form::open(['route' => ['products.destroy',$product->id],'method' => 'DELETE', 'id' => 'form-delete'])}}
    {{Form::close()}}
    <br/><br/>
    <table class="table table-bordered">
        <tbody>
        <tr>
            <th scope="row">Nome</th>
            <td>{{$product->name}}</td>
        </tr>
        <tr>
            <th scope="row">Nome abreviado</th>
            <td>{{$product->slug}}</td>
        </tr>
        <tr>
            <th scope="row">Detalhes</th>
            <td>{{$product->details}}</td>
        </tr>
            <tr>
            <th scope="row">Valor anterior</th>
            <td>R$ {{number_format($product->old_price, 2, ',', '.')}}</td>
        </tr>
        <tr>
            <th scope="row">Valor Atual</th>
            <td> R$ {{number_format($product->price, 2, ',', '.')}}</td>
        </tr>
        <tr>
            <th scope="row">Descrição</th>
            <td>{{$product->description}}</td>
        </tr>
        <tr>
            <th scope="row">Destaque</th>
            <td>{{$product->featured?'Sim': 'Não'}}</td>
        </tr>
        <tr>
            <th scope="row">Ativo</th>
            <td>{{$product->active?'Sim': 'Não'}}</td>
        </tr>
        </tbody>
    </table>   
@endsection