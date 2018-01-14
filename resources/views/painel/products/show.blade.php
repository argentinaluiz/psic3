@extends('layouts.app')
@section('pag_title', 'Produto - Mostrar')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Ver Produto</h3>
            <a class="btn btn-sm btn-primary" href="{{ route('products.edit',['product' => $product->id]) }}">Editar</a>
            <a class="btn btn-sm btn-danger" href="{{ route('products.destroy',['product' => $product->id]) }}"
                onclick="event.preventDefault();if(confirm('Deseja excluir este item?')){document.getElementById('form-delete').submit();}">Excluir</a>
            
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
                    <th scope="row">Descrição</th>
                    <td>{{$product->description}}</td>
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
					<th scope="row">Ativo</th>
					<td>{{$product->active?'Sim': 'Não'}}</td>
				</tr>
                </tbody>
            </table>
        </div>
    </div>
</div>    
@endsection