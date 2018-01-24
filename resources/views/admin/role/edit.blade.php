@extends('layouts.app')
@section('pag_title', 'Novo papel - Editar')

@section('content')
<div class="container">

	@include('admin._breadcrumb')
	
	<div class="row">
		<div class="col-md-12">
            <h3>Editar Papel</h3>
            <div class="cleaner_h25"></div>
			 @include('form._form_errors')
            {{ Form::model($registro,['route' => ['roles.update', $registro->id ], 'method' => 'PUT' ]) }}
                @include('admin.role._form')
                <button type="submit" class="btn btn-sm btn-default">Salvar</button>
            {{ Form::close() }}

		</div>
	</div>
</div>	
@endsection