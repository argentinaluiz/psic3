@extends('layouts.psicSecound')
@section('pag_title', 'Detalhes do Pacote')

@section('extra-css')

@endsection

@section('content')
    <section class="container padding-top-3x">
        <div class="container">
    		<div class="row">
                <div class="col-sm-4">
                    <img src="{{url("storage/products/{$product->image}")}}" alt="{{$product->id}}">
                </div>
                <div class="col-sm-8">
                    <h1 class="product-section-title">{{ $product->name }}</h1>
                    <div class="product-section-subtitle">{{ $product->details }}</div>
                    <div class="product-section-price">R$ {{number_format($product->price, 2, ',', '.')}}</div>
                    <p>
                        {{ $product->description }}
                    </p>

                    <form action="{{ route('cart.store') }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $product->id }}">
                        <input type="hidden" name="name" value="{{ $product->name }}">
                        <input type="hidden" name="price" value="{{ $product->price }}">
                        <button type="submit" class="btn btn-sm btn-primary">Add to Cart</button>
                    </form>
                </div>
            </div>
         </div>    
    </section>
    <section class="container padding-bottom-2x">
        @include('partials.might-like')
    </section>
@endsection
