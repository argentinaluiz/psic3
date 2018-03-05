@extends('layouts.app')
@section('pag_title', 'Perfil')

@section('breadcrumb')
    <h2>Configurações</h2>
     {!! Breadcrumb::withLinks(array('Home' => '/', 'Editar perfil' => route('site.perfil') ))!!}
@endsection

@section('h5-title')
     <h5>Editar Perfil</h5>
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
	<div class="row">
		<div class="col-sm-12">
			<form action="{{ route('site.perfil.update') }}" method="post">

			{{csrf_field()}}
			{{ method_field('PUT') }}
			<div class="form-group"><label>Nome</label> 
					<input type="text" name="name" class="form-control" value="{{ isset($user->name) && !old('name') ? $user->name : '' }}{{old('name')}}">
			</div>

			<div class="form-group"><label>E-mail</label> 
					<input type="email" name="email" class="form-control" value="{{ isset($user->email) && !old('email') ? $user->email : '' }}{{old('email')}}">
			</div>

			<div class="form-group"><label>Senha</label> 
					<input type="password" name="password" class="form-control">
			</div>

			<div class="form-group"><label>Confirme a senha</label> 
					<input type="password" name="password_confirmation" class="form-control">
			</div>

			<button class="btn btn-sm btn-primary">Atualizar</button>

			</form>
		</div>
	</div>

@endsection
