@extends('layouts.app')
@section('pag_title', 'Ordens')

@section('breadcrumb')
    <h2>Configurações</h2>
     {!! Breadcrumb::withLinks(array('Home' => '/', 'Lista das Ordens' => route('site.orders') ))!!}
@endsection

@section('h5-title')
     <h5>Lista das Ordens</h5>
@endsection

@section('content')

<section id="cart_items">
    <div class="row">
        <div class="col-md-12">
                @include('site.menu')
        </div>
    </div>
    
    <div class="row">
            <div class="col-md-12">
            <h3 ><span style='color:green'> {{ Auth::user()->name }}</span>, sua(s) ordem(ns)</h3>
            <table class="table table-striped table-responsive">
                <thead>
                    <tr>
                        <th>Data</th>
                        <th>Produto</th>
                        <th>Tipo de Pagamento</th>
                        <th>Ordem Total</th>
                        <th>Ordem Status</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>{{$order->created_at}}</td>
                        <td>{{ucwords($order->name)}}</td>
                        <td>{{$order->payment_type}}</td>
                        <td>{{$order->total}}</td>
                        <td>{{$order->status}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>



@endsection
