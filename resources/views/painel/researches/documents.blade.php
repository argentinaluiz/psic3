@extends('layouts.app')
@section('pag_title', 'Produto - Editar')

@section('breadcrumb')
    <h2>Produtos</h2>
   {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar produtos' => route('products.index'), 'Imagens' ))!!}
@endsection

@section('h5-title')
     <h5>Selecionar imagens</h5>
@endsection

@section('content')
	<div class="row">
		<?php $conta = 0; ?>
		@foreach($imagens as $imagem)
		  <?php $imagem->selecionado = false; ?>
		  @if($imagensProduct)
			@foreach($imagensProduct as $value)
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
			@can('products-create')
				<a class="btn btn-sm btn-primary" href="{{route('products.index')}}">Voltar</a>
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
          url: "{{route('products.gallery.store')}}",
          data: 'id='+id+'&product={{$product->id}}',
          success: function(data){
              console.log(data);
              $('#'+divID).html('<button onclick="removeImagem('+id+',\''+divID+'\')" class="btn btn-sm btn-danger">Remover imagem</button>');
          },
          error: function(){
              $('#'+divID).html('<a onclick="selecionaImagem('+id+',\''+divID+'\')" class="btn btn-sm btn-default">Selecionar imagem</a>');
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
            url: "{{route('products.gallery.remove')}}",
            data: 'id='+id+'&product={{$product->id}}',
            success: function(data){
                console.log(data);
                $('#'+divID).html('<a onclick="selecionaImagem('+id+',\''+divID+'\')" class="btn btn-sm btn-default">Selecionar imagem</a>');
            },
            error: function(){
                $('#'+divID).html('<button onclick="removeImagem('+id+',\''+divID+'\')" class="btn btn-sm btn-danger">Remover imagem</button>');
            }
        });
    }

  </script>
@endsection
