@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h2>Lista de Chamados</h2>
                        @can('create', App\Models\Painel\Call::class )
                            <a class="btn btn-sm btn-primary" href=""> Criar Chamados</a>
                        @endcan
                    <br><br>
                    @forelse($calls as $key => $value)
                        <p>{{ $value->title }} 
                            @can('view', $value )
                                @can('update', $value )
                                    <a href="/home/{{$value->id}}"> Editar</a>
                                @endcan
                                @can('delete', $value )
                                    <a href="/home/{{$value->id}}"> Deletar</a>
                                @endcan
                            @endcan
                        </p>
                    @empty
                        <p>Não existem chamados!</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
