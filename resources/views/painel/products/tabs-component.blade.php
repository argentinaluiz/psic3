@php
    $tabs = [
       ['title' => 'Informações','link' => route('products.edit',['product' => $product->id])],
       ['title' => 'Data','link' => route('',['product' => $product->id])],
    ]
@endphp

<div class="text-right">
    {!! Button::link('Listar produtos')->asLinkTo(route('products.index')) !!}
</div>
{!! \Navigation::tabs($tabs) !!}
<div>
    {!! $slot !!}
</div>