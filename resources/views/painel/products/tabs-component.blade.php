@php
    $tabs = [
       ['title' => 'Informações','link' => route('products.edit',['product' => $product->id])],
       ['title' => 'Imagens','link' => route('products.gallery',['product' => $product->id])],
    ]
@endphp

<div class="text-right">
    {!! Button::link('Listar produtos')->asLinkTo(route('products.index')) !!}
</div>
{!! \Navigation::tabs($tabs) !!}
<div>
    {!! $slot !!}
</div>