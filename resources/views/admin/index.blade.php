@extends('layouts.app')
@section('pag_title', 'Página do Administrador')

@section('breadcrumb')
    <h2>Configurações</h2>
   {!! Breadcrumb::withLinks(array('Home' => '/', 'Admin' ))!!}
@endsection

@section('h5-title')
     <h5>Painel administrativo</h5>
@endsection



@section('content')
  <div class="row">
      @can('researches-view')
        <div class="col-sm-3">
          <div class="widget p-lg text-center">
                <i class="fa fa-pie-chart fa-4x"></i>
                <div class="cleaner_h15"></div>
                <h3 class="font-bold no-margins"> Pesquisas</h3>
                <div class="cleaner_h15"></div>
                <a href="{{ route('researches.index')}}">Visualizar</a>
            </div>
        </div>
      @endCan
      @can('slides-view')
        <div class="col-sm-3">
          <div class="widget p-lg text-center">
                <i class="fa fa-sliders fa-4x"></i>
                <div class="cleaner_h15"></div>
                <h3 class="font-bold no-margins"> Slides</h3>
                <div class="cleaner_h15"></div>
                <a href="{{ route('slides.index')}}">Visualizar</a>
            </div>
        </div>
      @endCan
      @can('images-view')
        <div class="col-sm-3">
          <div class="widget p-lg text-center">
                <i class="fa fa-camera fa-4x"></i>
                <div class="cleaner_h15"></div>
                <h3 class="font-bold no-margins"> Biblioteca de Imagens</h3>
                <div class="cleaner_h15"></div>
                <a href="{{ route('imagens.index')}}">Visualizar</a>
            </div>
        </div>
      @endCan

      @can('users-view')
        <div class="col-sm-3">
          <div class="widget p-lg text-center">
                <i class="fa fa-user fa-4x"></i>
                <div class="cleaner_h15"></div>
                <h3 class="font-bold no-margins"> Usuários</h3>
                <div class="cleaner_h15"></div>
                <a href="{{ route('users.index')}}">Visualizar</a>
            </div>
        </div>
      @endCan

      @can('favorites-view')
        <div class="col-sm-3">
          <div class="widget p-lg text-center">
                <i class="fa fa-star fa-4x"></i>
                <div class="cleaner_h15"></div>
                <h3 class="font-bold no-margins"> Favoritos</h3>
                <div class="cleaner_h15"></div>
                <a href="{{ route('site.favorites')}}">Visualizar</a>
            </div>
        </div>
      @endCan

      @can('perfil-view')
        <div class="col-sm-3">
          <div class="widget p-lg text-center">
                <i class="fa fa-tag fa-4x"></i>
                <div class="cleaner_h15"></div>
                <h3 class="font-bold no-margins"> Perfil</h3>
                <div class="cleaner_h15"></div>
                <a href="">Visualizar</a>
            </div>
        </div>
      @endCan

      @can('products-view')
        <div class="col-sm-3">
          <div class="widget p-lg text-center">
                <i class="fa fa-shield fa-4x"></i>
                <div class="cleaner_h15"></div>
                <h3 class="font-bold no-margins"> Papéis</h3>
                <div class="cleaner_h15"></div>
                <a href="{{ route('roles.index')}}">Visualizar</a>
            </div>
        </div>
      @endCan
  </div>
@endsection

