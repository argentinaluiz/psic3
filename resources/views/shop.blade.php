@extends('layouts.psicSecound')
@section('pag_title', 'Detalhes do Pacote')

@section('content')
    <section class="container padding-top-3x">
        <div class="row">
            @forelse ($products as $product)
                <div class="col-md-4">
                    <a href="{{ route('shop.show', $product->slug) }}"><img src="{{url("media/img/products/{$product->image}")}}" alt="{{$product->id}}"></a>
                    <a href="{{ route('shop.show', $product->slug) }}"><div class="product-name">{{ $product->name }}</div></a>
                    <div class="product-price">{{ $product->textPrice }}</div>
                    <div class="product">{{ $product->details }}</div>
                    <div class="product">{{ $product->slug }}</div>
                </div>
            @empty
                <div style="text-align: left">No items found</div>
            @endforelse
        </div> <!-- end products -->
    </section>
@endsection
