    <section id="might-like-section" class="might-like-section padding-top-3x padding-bottom-3x">
        <div class="container">
            <div class="row m-b-lg">
                <div class="col-lg-12 text-center">
                    <div class="navy-line"></div>
                    <h1>Você poderia gostar também...</h1>
                    <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod.</p>
                </div>
            </div>
             <div class="row">
                @foreach ($mightAlsoLike as $product)
                    <div class="col-md-3">
                        <div class="ibox">
                            <div class="ibox-content product-box">
                                <div class="product-images">
                                    <a href="{{ route('shop.show', $product->slug) }}">
                                        <img src="{{ url($product->imagens()->where('deleted','=','N')->orderBy('order')->first()->imagem->galeriaUrl()) }}" alt="item" class="checkout-table-img">
                                    </a>  
                                </div>
                                <div class="product-desc">
                                    <span class="product-price">
                                        {{$product->textPrice}}
                                    </span>
                                    <a href="{{ route('shop.show', $product->slug) }}" class="product-name"> {{$product->name}}</a>

                                    <div class="small m-t-xs">
                                        {{$product->description}}
                                    </div>
                                 
                                    <a class="btn btn-sm btn-primary" href="{{ route('shop.show', $product->slug) }}">Ver mais <i class="fa fa-long-arrow-right"></i></a>

                                </div>
                             </div>
                         </div>
                    </div>
                @endforeach            
            </div>
        </div>
    </section>