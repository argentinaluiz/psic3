@extends('layouts.app')
@section('pag_title', 'Produto - Mostrar')

@section('breadcrumb')
    <h2>Produtos</h2>
     {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar produtos' => route('products.index'), 'Ver Produto' ))!!}
@endsection

@section('h5-title')
     <h5>Ver Produto</h5>
@endsection

@section('content')
     @php
        $linkEdit = route('products.edit',['product' => $product->id]);
        $linkDelete = route('products.destroy',['product' => $product->id]);
    @endphp
    {!! Button::primary(Icon::pencil().' Editar')->asLinkTo($linkEdit) !!}
    {!!
        Button::danger(Icon::remove().' Excluir')->asLinkTo($linkDelete)
        ->addAttributes([
            'onclick' => 'event.preventDefault();if(confirm("Deseja excluir?")){document.getElementById("form-delete").submit();}'
        ])
    !!}
    @php
        $formDelete = FormBuilder::plain([
            'id' => 'form-delete',
            'url' => $linkDelete,
            'method' => 'DELETE',
            'style' => 'display:none'
        ])
    @endphp
    {!! form($formDelete) !!}

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
            <th scope="row">Preço anterior</th>
            <td> {{$product->textOldPrice}}</td>
        </tr>
        <tr>
            <th scope="row">Preço</th>
            <td> {{$product->textPrice}}</td>
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