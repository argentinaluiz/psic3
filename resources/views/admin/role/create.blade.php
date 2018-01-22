@extends('layouts.app')

@section('content')
<div class="container">

	@include('admin._breadcrumb')

	<div class="row">
		<div class="col-md-12">
			<h3>Adicionar Papel</h3>
			<div class="cleaner_h25"></div>
			<form action="{{ route('roles.store') }}" method="post">

			{{csrf_field()}}
			@include('admin.role._form')

			<button class="btn btn-sm btn-default">Adicionar</button>

				
			</form>
		</div>	
	</div>
</div>
	

@endsection