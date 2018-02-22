@extends('layouts.app')
@section('pag_title', 'Pesquisa - Editar')

@section('breadcrumb')
    <h2>Pesquisas</h2>
   {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar pesquisas' => route('researches.index'), 'Documentos' ))!!}
@endsection

@section('h5-title')
     <h5>Selecionar documentos</h5>
@endsection

@section('content')
	<div class="row">
		<?php $conta = 0; ?>
		@foreach($documents as $document)
		  <?php $document->selecionado = false; ?>
		  @if($documentsResearch)
			@foreach($documentsResearch as $value)
			  @if($value->document_id == $document->id)
				<?php $document->selecionado = true; ?>
			  @endif
			@endforeach
		  @endif
			<div class="col-sm-2">
			  <div class="widget">
				  
				  <div class="cleaner_h15"></div>
				  <p class="font-bold"> {{$document->title}}</p>
				  <p id="divID{{$document->id}}"> 
					@if($document->selecionado)
					  <a onclick="removeDocument({{$document->id}},'divID{{$document->id}}')" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-remove"></span> Remover documento</a>
					@else
						<a onclick="selecionaDocument({{$document->id}},'divID{{$document->id}}')" class="btn btn-sm btn-default">Selecionar documento</a>
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

	{{ $documents->links() }}

	<div class="row">
		<div class="col-sm-12">
			@can('researches-create')
				<a class="btn btn-sm btn-primary" href="{{route('researches.index')}}">Voltar</a>
			@endcan
		</div>
	</div>
	
	<script type="text/javascript">
    function selecionaDocument(id,divID){
      $('#'+divID).html('<button class="btn btn-sm btn-warning">Processando..</button>');
      $.ajax({
          headers: {
              'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
          },
          type: 'POST',
          url: "{{route('researches.arcade.store')}}",
          data: 'id='+id+'&research={{$research->id}}',
          success: function(data){
              console.log(data);
              $('#'+divID).html('<button onclick="removeDocument('+id+',\''+divID+'\')" class="btn btn-sm btn-danger">Remover documento</button>');
          },
          error: function(){
              $('#'+divID).html('<a onclick="selecionaDocument('+id+',\''+divID+'\')" class="btn btn-sm btn-default">Selecionar documento</a>');
          }
      });
    }
    function removeDocument(id,divID){
        $('#'+divID).html('<button class="btn btn-sm btn-warning">Processando..</button>');
        $.ajax({
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'DELETE',
            url: "{{route('researches.arcade.remove')}}",
            data: 'id='+id+'&research={{$research->id}}',
            success: function(data){
                console.log(data);
                $('#'+divID).html('<a onclick="selecionaDocument('+id+',\''+divID+'\')" class="btn btn-sm btn-default">Selecionar documento</a>');
            },
            error: function(){
                $('#'+divID).html('<button onclick="removeDocument('+id+',\''+divID+'\')" class="btn btn-sm btn-danger">Remover documento</button>');
            }
        });
    }

  </script>
@endsection
