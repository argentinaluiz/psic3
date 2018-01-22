@extends('layouts.app')
@section('pag_title', 'Página do Administrador')

@section('content')
<div class="container">

    @include('admin._breadcrumb')

      <div class="row">

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

        <div class="col-sm-3">
          <div class="card blue">
            <div class="card-content white-text">
              <span class="card-title">Favoritos</span>
              <p>Lista de carros favoritos</p>
            </div>
            <div class="card-action">
              <a href="#">Visualizar</a>
            </div>
          </div>
        </div>

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

      </div>
</div>
@endsection

