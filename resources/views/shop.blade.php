@extends('layouts.psicSecound')
@section('pag_title', 'Detalhes do Pacote')

@section('content')
    <section class="container padding-top-3x">
        <div class="row">
            @component('components.list_product',['list'=>$products,'size'=>'4'])
            @endcomponent
        </div> <!-- end products -->
    </section>
@endsection
