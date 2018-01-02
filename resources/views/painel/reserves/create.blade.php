@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Nova reserva</h3> 
            @include('form._form_errors')
            {{ Form::open(['route' => 'reserves.store']) }}
                @include('painel.reserves._form')
                <button type="submit" class="btn btn-sm btn-default">Criar</button>
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection