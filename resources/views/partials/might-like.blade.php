    <section id="might-like-section" class="might-like-section padding-top-3x padding-bottom-3x">
        <div class="container">
            <div class="row m-b-lg">
                <div class="col-lg-12 text-center">
                    <div class="navy-line"></div>
                    <h1>You might also like...</h1>
                    <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod.</p>
                </div>
            </div>
             <div class="row">
                @foreach ($mightAlsoLike as $product)
                    <div class="col-md-3">
                        <a href="{{ route('shop.show', $product->slug) }}"><img src="{{url("storage/products/{$product->image}")}}" alt="product"></a>
                        <a href="{{ route('shop.show', $product->slug) }}"><div class="product-name">{{ $product->name }}</div></a>
                        <div class="product">{{ $product->details }}</div>
                        <div class="product">R$ {{number_format($product->price, 2, ',', '.')}}</div>
                        <a class="btn btn-sm btn-primary" href="{{ route('shop.show', $product->slug) }}">Details</a>
                    </div>
                @endforeach            
            </div>
        </div>
    </section>