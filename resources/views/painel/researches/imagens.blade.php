@extends('layouts.app')
@section('pag_title', 'Pesquisas - Imagens')

@section('breadcrumb')
    <h2>Pesquisas</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar pesquisas' => route('researches.index'), 'Imagens' ))!!}
@endsection

@section('h5-title')
     <h5>Selecionar imagens</h5>
@endsection

@section('content')
  <div class="row">
    <div class="col-sm-12">

      <?php $conta = 0; ?>
      @foreach($imagens as $imagem)
        <?php $imagem->selecionado = false; ?>
        @if($imagensSearch)
          @foreach($imagensSearch as $value)
            @if($value->imagem_id == $imagem->id)
              <?php $imagem->selecionado = true; ?>
            @endif
          @endforeach
        @endif
        
		<div class="row">
            <div class="col-sm-3">
                <div class="widget">
                    <img class="img-responsive" src="{{$imagem->url}}">
                    <div class="cleaner_h15"></div>
                    <p class="font-bold no-margins"> {{$imagem->title}}</p>
                    <p id="divID{{$imagem->id}}"> 
                      @if($imagem->selecionado)
                        <a onclick="removeImagem({{$imagem->id}},'divID{{$imagem->id}}')" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-remove"></span> Remover imagem</a>
                      @else
                          <a onclick="selecionaImagem({{$imagem->id}},'divID{{$imagem->id}}')" class="btn btn-sm btn-primary">Selecionar imagem</a>
                      @endif  
                    </p>
                </div>
            </div>
        </div>
          <?php $conta++; ?>
          @if($conta == 3)
            <?php $conta=0; ?>
    </div>
  </div>
    <div class="row">
          @endif
      @endforeach
	</div>

  {{ $imagens->links() }}

	<div class="row">
		<div class="col-sm-12">
			@can('researches-create')
			<a class="btn btn-sm btn-primary" href="{{route('researches.index')}}">Voltar</a>
			@endcan
		</div>
	</div>

@endsection

@section('extra-js')
  <script type="text/javascript">
    function selecionaImagem(id,divID){
      $('#'+divID).html('<button class="btn btn-sm btn-warning">Processando..</button>');
      $.ajax({
          headers: {
              'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
          },
          type: 'POST',
          url: "{{route('researches.gallery.store')}}",
          data: 'id='+id+'&search={{$search->id}}',
          success: function(data){
              console.log(data);
              $('#'+divID).html('<button onclick="removeImagem('+id+',\''+divID+'\')" class="btn btn-sm btn-danger">Remover imagem</button>');
          },
          error: function(){
              $('#'+divID).html('<a onclick="selecionaImagem('+id+',\''+divID+'\')" class="btn btn-sm btn-primary">Selecionar imagem</a>');
          }
      });
    }
    function removeImagem(id,divID){
        $('#'+divID).html('<button class="btn btn-sm btn-danger">Processando..</button>');
        $.ajax({
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'DELETE',
            url: "{{route('researches.gallery.delete')}}",
            data: 'id='+id+'&search={{$search->id}}',
            success: function(data){
                console.log(data);
                $('#'+divID).html('<a onclick="selecionaImagem('+id+',\''+divID+'\')" class="btn btn-sm btn-primary">Selecionar imagem</a>');
            },
            error: function(){
                $('#'+divID).html('<button onclick="removeImagem('+id+',\''+divID+'\')" class="btn btn-sm btn-danger">Remover imagem</button>');
            }
        });
    }
  </script>
@endsection