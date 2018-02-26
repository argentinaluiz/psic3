@extends('layouts.psicSecound')
@section('pag_title', 'Shopping Cart')

@section('extra-css')
    <link rel="stylesheet" href="{{asset('css/cart.css')}}"/>
@endsection

@section('content')

    <div class="cart-section container">
        <div>
            @if (session()->has('success_message'))
                <div class="alert alert-success">
                    {{ session()->get('success_message') }}
                </div>
            @endif

            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (Cart::count() > 0)

            <h2>{{ Cart::count() }} item(s) no carrinho</h2>

            <div class="cart-table">
                @foreach (Cart::content() as $item)
                <div class="cart-table-row">
                    <div class="cart-table-row-left">
                        <a href="{{ route('shop.show', $item->model->slug) }}">
                             <img src="{{ url($item->model->imagens()->where('deleted','=','N')->orderBy('order')->first()->imagem->galeriaUrl()) }}" alt="item" class="cart-table-img">
                        </a>
                        <div class="cart-item-details">
                            <div class="cart-table-item"><a href="{{ route('shop.show', $item->model->slug) }}">{{ $item->model->name }}</a></div>
                            <div class="cart-table-description">{{ $item->model->details }}</div>
                        </div>
                    </div>
                    <div class="cart-table-row-right">
                        <div class="cart-table-actions">
                            <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <button type="submit" class="btn btn-sm btn-default">Remover</button>
                            </form>

                            <form action="{{ route('cart.switchToSaveForLater', $item->rowId) }}" method="POST">
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-sm btn-default">Salve para depois</button>
                            </form>
                        </div>
                        <div>
                            <select class="quantity" data-id="{{ $item->rowId }}">
                                @for ($i = 1; $i < 5 + 1 ; $i++)
                                    <option {{ $item->qty == $i ? 'selected' : '' }}>{{ $i }}</option>
                                @endfor
                                {{-- <option {{ $item->qty == 1 ? 'selected' : '' }}>1</option>
                                <option {{ $item->qty == 2 ? 'selected' : '' }}>2</option>
                                <option {{ $item->qty == 3 ? 'selected' : '' }}>3</option>
                                <option {{ $item->qty == 4 ? 'selected' : '' }}>4</option>
                                <option {{ $item->qty == 5 ? 'selected' : '' }}>5</option> --}}
                            </select>
                        </div>
                         <div>R$ {{ number_format($item->subtotal, 2, ',', '.') }}</div>
                    </div>
                </div> <!-- end cart-table-row -->
                @endforeach

            </div> <!-- end cart-table -->

             <div class="cart-totals">
                <div class="cart-totals-left">
                    Shipping is free because we’re awesome like that. Also because that’s additional stuff I don’t feel like figuring out :).
                </div>

                <div class="cart-totals-right">
                    <div>
                        Subtotal <br>
                        Tax (13%)<br>
                        <span class="cart-totals-total">Total</span>
                    </div>
                    <div class="cart-totals-subtotal">
                         R$ {{ (Cart::subtotal()) }} <br>
                        R$ {{ (Cart::tax()) }} <br>
                        <span class="cart-totals-total">R$ {{ (Cart::total()) }}</span>
                    </div>
                </div>
            </div> <!-- end cart-totals -->

            
            <div class="cart-buttons">
                <a href="{{ route('site.home.index') }}" class="btn btn-sm btn-warning">Escolher mais produtos</a>
                <a href="{{ route('checkout.index') }}" class="btn btn-sm btn-primary">Comprar</a>
            </div>

            @else

                <h3>Não têm item no carrinho!</h3>
                <div class="spacer"></div>
                <a href="{{ route('site.home.index') }}" class="btn btn-sm btn-warning">Escolher mais produtos</a>
                <div class="spacer"></div>

            @endif

            @if (Cart::instance('saveForLater')->count() > 0)

            <h2>{{ Cart::instance('saveForLater')->count() }} item(s) salvo para depois</h2>

            <div class="saved-for-later cart-table">
                @foreach (Cart::instance('saveForLater')->content() as $item)
                <div class="cart-table-row">
                    <div class="cart-table-row-left">
                        
                        <a href="{{ route('shop.show', $item->model->slug) }}">
                            <img src="{{ url($item->model->imagens()->where('deleted','=','N')->orderBy('order')->first()->imagem->galeriaUrl()) }}" alt="item" class="cart-table-img">
                        </a>
                        <div class="cart-item-details">
                            <div class="cart-table-item"><a href="{{ route('shop.show', $item->model->slug) }}">{{ $item->model->name }}</a></div>
                            <div class="cart-table-description">{{ $item->model->details }}</div>
                        </div>
                    </div>
                    <div class="cart-table-row-right">
                        <div class="cart-table-actions">
                            <form action="{{ route('saveForLater.destroy', $item->rowId) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <button type="submit" class="btn btn-sm btn-default">Remover</button>
                            </form>

                            <form action="{{ route('saveForLater.switchToCart', $item->rowId) }}" method="POST">
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-sm btn-default">Mover para o Carrinho</button>
                            </form>
                        </div>

                        <div>{{ $item->model->textPrice }}</div>
                    </div>
                </div> <!-- end cart-table-row -->
                @endforeach

            </div> <!-- end saved-for-later -->

            @else

            <h3>Você não tem nenhum item salvo para depois.</h3>

            @endif

        </div>

    </div> <!-- end cart-section -->

    @include('partials.might-like')


@endsection

@section('extra-js')
    <script src="{{ asset('js/appCart.js') }}"></script>
    <script>
        (function(){
            const classname = document.querySelectorAll('.quantity')

            Array.from(classname).forEach(function(element) {
                element.addEventListener('change', function() {
                    const id = element.getAttribute('data-id')
                    axios.patch(`/cart/${id}`, {
                        quantity: this.value
                    })
                    .then(function (response) {
                        // console.log(response);
                        window.location.href = '{{ route('cart.index') }}'
                    })
                    .catch(function (error) {
                        // console.log(error);
                        window.location.href = '{{ route('cart.index') }}'
                    });
                })
            })
        })();
    </script>
@endsection
