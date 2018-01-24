@extends('layouts.app')
@section('pag_title', 'Usuários - Editar')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Editar Usuário</h3>
            @include('form._form_errors')
            {{ Form::model($user,['route' => ['users.update',$user->id], 'class' => 'form form-search form-ds', 'files' => true, 'method' => 'PUT' ]) }}
                @include('admin.users._form')
                <button type="submit" class="btn btn-sm btn-default">Salvar</button>
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection