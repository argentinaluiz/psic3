@extends('layouts.psicSecound')
@section('pag_title', 'Detalhes do Pacote')

@section('extra-css')

@endsection

@section('content')
    <section class="container padding-top-3x">
		<div class="row">
            <div class="col-lg-12">
                <div class="ibox product-detail">
                    <div class="ibox-content" style="border: none;">
                        <div class="row">
                            <div class="col-md-5">
                                @component('components.imagem',['list'=>$product->imagens()->where('deleted','=','N')->get()])
                                @endcomponent
                            </div>
                            <div class="col-md-7">
                                <h2 class="font-bold m-b-xs">{{ $product->name }}</h2>
                                <small>{{ $product->slug }}</small>
                                <div class="m-t-md">
                                    <h2 class="product-main-price">{{ $product->textPrice }}</h2>
                                </div>
                                <hr>

                                <h4>Descrição</h4>

                                <div class="small text-muted">
                                     {{ $product->description }}
                                </div>
                                
                                <div class="small text-muted">
                                     {{ $product->details }}
                                </div>
                                
                                <dl class="small m-t-md">
                                    <dt>Categorias</dt>
                                    <dd>A description list is perfect for defining terms.</dd>
                                    <dt>Euismod</dt>
                                    <dd>Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit.</dd>
                                    <dd>Donec id elit non mi porta gravida at eget metus.</dd>
                                    <dt>Malesuada porta</dt>
                                    <dd>Etiam porta sem malesuada magna mollis euismod.</dd>
                                </dl>
                                <hr>

                                <div>
                                    <div class="btn-group">
                                        <form action="{{ route('cart.index') }}" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="id" value="{{ $product->id }}">
                                            <input type="hidden" name="name" value="{{ $product->name }}">
                                            <input type="hidden" name="price" value="{{ $product->price }}">
                                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-cart-plus"></i> Adicionar ao carrinho</button>
                                        </form>
                                        <button class="btn btn-white btn-sm"><i class="fa fa-star"></i> Add to wishlist </button>
                                        <button class="btn btn-white btn-sm"><i class="fa fa-envelope"></i> Contato </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
    </section>
    <section class="container padding-bottom-2x">
        @include('partials.might-like')
    </section>
@endsection
