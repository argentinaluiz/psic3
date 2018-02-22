@php
    $tabs = [
       ['title' => 'Informações','link' => route('researches.edit',['research' => $research->id])],
       ['title' => 'Categorias','link' => route('researches.category',['research' => $research->id])],
       ['title' => 'Documentos','link' => route('researches.arcade',['research' => $research->id])],
    ]
@endphp

<div class="text-right">
    {!! Button::link('Listar pesquisas')->asLinkTo(route('researches.index')) !!}
</div>
{!! \Navigation::tabs($tabs) !!}
<div>
    {!! $slot !!}
</div>