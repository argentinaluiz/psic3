@extends('layouts.app')
@section('pag_title', 'Slide - Editar')

@section('breadcrumb')
  <h2>Slides</h2>
  {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar slides' => route('slides.index'), 'Imagens' ))!!}
@endsection

@section('h5-title')
     <h5>Selecionar imagens</h5>
@endsection

@section('content')
	<div class="row">
		<?php $conta = 0; ?>
		@foreach($imagens as $imagem)
		  <?php $imagem->selecionado = false; ?>
		  @if($imagensSlide)
			@foreach($imagensSlide as $value)
			  @if($value->imagem_id == $imagem->id)
				<?php $imagem->selecionado = true; ?>
			  @endif
			@endforeach
		  @endif
			<div class="col-sm-2">
			  <div class="widget">
				  <img class="img-responsive" src="{{$imagem->pequenaUrl()}}">
				  <div class="cleaner_h15"></div>
				  <p class="font-bold"> {{$imagem->title}}</p>
				  <p id="divID{{$imagem->id}}"> 
					@if($imagem->selecionado)
					  <a onclick="removeImagem({{$imagem->id}},'divID{{$imagem->id}}')" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-remove"></span> Remover imagem</a>
					@else
						<a onclick="selecionaImagem({{$imagem->id}},'divID{{$imagem->id}}')" class="btn btn-sm btn-default">Selecionar imagem</a>
					@endif  
				  </p>
			  </div>
			</div>
			<?php $conta++; ?>
			@if($conta == 6)
			  <?php $conta=0; ?>
	</div>
	<div class="row">
					@endif		
			@endforeach
	</div>

	{{ $imagens->links() }}

	<div class="row">
		<div class="col-sm-12">
			@can('slides-create')
				<a class="btn btn-sm btn-primary" href="{{route('slides.index')}}">Voltar</a>
			@endcan
		</div>
	</div>
	
	<script type="text/javascript">
    function selecionaImagem(id,divID){
      $('#'+divID).html('<button class="btn btn-sm btn-warning">Processando..</button>');
      $.ajax({
          headers: {
              'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
          },
          type: 'POST',
          url: "{{route('slides.store.ajax')}}",
          data: 'id='+id,
          success: function(data){
              console.log(data);
              $('#'+divID).html('<button onclick="removeImagem('+id+',\''+divID+'\')" class="btn green">Remover imagem</button>');
          },
          error: function(){
              $('#'+divID).html('<a onclick="selecionaImagem('+id+',\''+divID+'\')" class="btn blue">Selecionar imagem</a>');
          }
      });
    }
    function removeImagem(id,divID){
        $('#'+divID).html('<button class="btn btn-sm btn-warning">Processando..</button>');
        $.ajax({
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'DELETE',
            url: "{{route('slides.remove.ajax')}}",
            data: 'id='+id,
            success: function(data){
                console.log(data);
                $('#'+divID).html('<a onclick="selecionaImagem('+id+',\''+divID+'\')" class="btn blue">Selecionar imagem</a>');
            },
            error: function(){
                $('#'+divID).html('<button onclick="removeImagem('+id+',\''+divID+'\')" class="btn green">Remover imagem</button>');
            }
        });
    }

  </script>
@endsection
