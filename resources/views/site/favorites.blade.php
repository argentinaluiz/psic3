@extends('layouts.app')
@section('pag_title', 'Favoritos')

@section('breadcrumb')
    <h2>Produtos</h2>
     {!! Breadcrumb::withLinks(array('Home' => '/', 'Lista de favoritos' => route('site.favorites') ))!!}
@endsection

@section('h5-title')
     <h5>Lista de Favoritos</h5>
@endsection

@section('content')
  @if (session('status'))
	<div class="row">
		<div class="col-sm-12">
            <div class="widget p-lg text-center">
                <i class="fa fa-thumbs-o-up fa-4x"></i>
                <div class="cleaner_h15"></div>
                <h3 class="font-bold no-margins"> Status</h3>
                <div class="cleaner_h15"></div>
                <p>{{session('status')}}</p>
            </div>
        </div>
    </div>
  @endif

    <div class="row">
        <div class="col-md-12">
                @include('site.menu')
        </div>
    </div>
    @component('components.list_product',['list'=>$products,'size'=>'4'])
    @endcomponent

@endsection
