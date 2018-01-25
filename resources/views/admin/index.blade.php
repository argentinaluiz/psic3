@extends('layouts.app')
@section('pag_title', 'Página do Administrador')

@section('content')
<div class="container">

     {!! Breadcrumb::withLinks(array('Home' => '/', 'Admin' ))!!}

      <div class="row">

      @can('users-view')
        <div class="col-sm-3">
          <div class="card purple darken-2">
            <div class="card-content white-text">
              <span class="card-title">Usuários</span>
              <p>Usuários do sistema</p>
            </div>
            <div class="card-action">
              <a href="{{ route('users.index')}}">Visualizar</a>
            </div>
          </div>
        </div>
      @endCan

      @can('favorites-view')
        <div class="col-sm-3">
          <div class="card blue">
            <div class="card-content white-text">
              <span class="card-title">Favoritos</span>
              <p>Lista de produtos favoritos</p>
            </div>
            <div class="card-action">
              <a href="#">Visualizar</a>
            </div>
          </div>
        </div>
      @endCan

      @can('perfil-view')
       <div class="col-sm-3">
          <div class="card green">
            <div class="card-content white-text">
              <span class="card-title">Perfil</span>
              <p>Alterar dados do perfil</p>
            </div>
            <div class="card-action">
              <a href="#">Visualizar</a>
            </div>
          </div>
        </div>
      @endCan

      @can('products-view')
        <div class="col-sm-3">
          <div class="card orange darken-4">
            <div class="card-content white-text">
              <span class="card-title">Papéis</span>
              <p>Listar papéis do sistema</p>
            </div>
            <div class="card-action">
              <a href="{{ route('roles.index')}}">Visualizar</a>
            </div>
          </div>
        </div>
      @endCan

      </div>
</div>
@endsection

