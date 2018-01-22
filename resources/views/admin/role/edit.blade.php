@extends('layouts.app')
@section('pag_title', 'Editar: Papel')

@section('content')
<div class="container">

	@include('admin._breadcrumb')
	
	<div class="row">
		<div class="col-md-12">
            <h3>Editar Papel</h3>
            <div class="cleaner_h25"></div>
			<form action="{{ route('roles.update',$registro->id) }}" method="post">

			{{csrf_field()}}
			{{ method_field('PUT') }}
			@include('admin.role._form')
			<div class="cleaner_h25"></div>
			<button class="btn btn-sm btn-primary">Atualizar</button>
			</form>
		</div>
	</div>
</div>
	

@endsection