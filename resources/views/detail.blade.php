@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <h2>Detalhe de Chamado</h2>
      @can('view', $call )
        Título: {{$call->title}} <br>
        Descrição: {{$call->description}} <br>
        Status: {{$call->status}}
      @else
        <h3>Você não tem permissão para acessar esse registro!</h3>
      @endcan

    </div>
</div>
@endsection
