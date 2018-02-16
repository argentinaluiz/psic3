@extends('layouts.psicSecound')
@section('pag_title', 'Detalhes do Pacote')

@section('content')
    <section class="container padding-top-3x">
        <div class="col-lg-12">
            <div class="ibox product-detail">
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="product-images slick-initialized slick-slider">
                                @component('components.slide',['list'=>$product->imagens()->where('deleted','=','N')->get()])
                                @endcomponent
                            </div>
                        </div>
                        <div class="col-md-7">
                            <h2 class="font-bold m-b-xs">
                                Categorias
                            </h2>
                            <small>{{$product->textCategories}}</small>
                            <div class="m-t-md">
                                <h2 class="product-main-price">{{$product->textPrice}}<small class="text-muted">Exclude Tax</small> </h2>
                            </div>
                            <hr>
                            <h4>Descrição</h4>
                            <div class="small text-muted">
                                {{$product->description}}
                            </div>
                            <hr>
                            <div>
                                <div class="btn-group">
                                    <button class="btn btn-primary btn-sm"><i class="fa fa-cart-plus"></i> Add to cart</button>
                                    <button class="btn btn-white btn-sm"><i class="fa fa-star"></i> Add to wishlist </button>
                                    <button class="btn btn-white btn-sm"><i class="fa fa-envelope"></i> Contact </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
