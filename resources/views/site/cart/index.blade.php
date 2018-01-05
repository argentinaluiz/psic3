@extends('layouts.psic')
@section('pag_title', 'COMPRAS')

@section('content')

<div class="container">
    <div class="row">
        <h3>Produtos no carrinho</h3>
        <hr/>
        @if (Session::has('mensagem-sucesso'))
            <div class="card-panel green">
                <strong>{{ Session::get('mensagem-sucesso') }}</strong>
            </div>
        @endif
        @if (Session::has('mensagem-falha'))
            <div class="card-panel red">
                <strong>{{ Session::get('mensagem-falha') }}</strong>
            </div>
        @endif
        @forelse ($orders as $order)
            <h5 class="col l6 s12 m6"> Pedido: {{ $order->id }} </h5>
            <h5 class="col l6 s12 m6"> Criado em: {{ $order->created_at->format('d/m/Y H:i') }} </h5>
            <table>
                <thead>
                    <tr>
                        <th></th>
                        <th>Qtd</th>
                        <th>Produto</th>
                        <th>Valor Unit.</th>
                        <th>Desconto(s)</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $total_order = 0;
                    @endphp
                    @foreach ($order->order_products as $order_product)

                    <tr>
                        <td>
                            <img width="100" height="100" src="{{ $order_product->product->image }}">
                        </td>
                        <td class="center-align">
                            <div class="center-align">
                                <a class="col l4 m4 s4" href="#" onclick="cartRemoverProduto({{ $order->id }}, {{ $order_product->product_id }}, 1 )">
                                    <i class="material-icons small">remove_circle_outline</i>
                                </a>
                                <span class="col l4 m4 s4"> {{ $order_product->qtd }} </span>
                                <a class="col l4 m4 s4" href="#" onclick="cartAdicionarProduto({{ $order_product->product_id }})">
                                    <i class="material-icons small">add_circle_outline</i>
                                </a>
                            </div>
                            <a href="#" onclick="cartRemoverProduto({{ $order->id }}, {{ $order_product->product_id }}, 0)" class="tooltipped" data-position="right" data-delay="50" data-tooltip="Retirar produto do carrinho?">Retirar produto</a>
                        </td>
                        <td> {{ $order_product->product->name }} </td>
                        <td>R$ {{ number_format($order_product->product->value, 2, ',', '.') }}</td>
                        <td>R$ {{ number_format($order_product->discounts, 2, ',', '.') }}</td>
                        @php
                            $total_product = $order_product->values - $order_product->discounts;
                            $total_order += $total_product;
                        @endphp
                        <td>R$ {{ number_format($total_product, 2, ',', '.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <strong class="col offset-l6 offset-m6 offset-s6 l4 m4 s4 right-align">Total do pedido: </strong>
                <span class="col l2 m2 s2">R$ {{ number_format($total_order, 2, ',', '.') }}</span>
            </div>
            <div class="row">
                <form method="POST" action="{{ route('cart.desconto') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="order_id" value="{{ $order->id }}">
                    <strong class="col s4 m4 l3 offset-l4 right-align">Cupom de desconto: </strong>
                    <input class="col s6 m6 l3" type="text" name="cupom">
                    <button class="btn-flat btn-large col s2 m2 l2">Validar</button>
                </form>
            </div>
            <div class="row">
                <a class="btn-large tooltipped col l4 s4 m4 offset-l2 offset-s2 offset-m2" data-position="top" data-delay="50" data-tooltip="Voltar a página inicial para continuar comprando?" href="{{ route('index') }}">Continuar comprando</a>
                <form method="POST" action="{{ route('cart.concluir') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="order_id" value="{{ $order->id }}">
                    <button type="submit" class="btn-large blue col offset-l1 offset-s1 offset-m1 l5 s5 m5 tooltipped" data-position="top" data-delay="50" data-tooltip="Adquirir os produtos concluindo a compra?">
                        Concluir compra
                    </button>   
                </form>
            </div>
        @empty
            <h5>Não há nenhum pedido no carrinho</h5>
        @endforelse
    </div>
</div>

<form id="form-remover-produto" method="POST" action="{{ route('cart.remover') }}">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
    <input type="hidden" name="order_id">
    <input type="hidden" name="product_id">
    <input type="hidden" name="item">
</form>
<form id="form-adicionar-produto" method="POST" action="{{ route('cart.adicionar') }}">
    {{ csrf_field() }}
    <input type="hidden" name="id">
</form>

@push('scripts')
    <script type="text/javascript" src="{{ asset('site/js/cart.js') }}"></script>
@endpush

@endsection