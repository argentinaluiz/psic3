@extends('layouts.app')
@section('pag_title', 'Usuários')

@section('breadcrumb')
    <h2>Configurações</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar usuários' => route('users.index')))!!}
@endsection

@section('h5-title')
     <h5>Listagem de usuários</h5>
@endsection

@section('content')      
    <span class="pull-right small text-muted">Total de usuários: {{ $totalUsers }} </span>
    <br/>
    @can('users-create')
        {!! Button::primary(Icon::create('plus').' Novo usuário')->asLinkTo(route('users.create')) !!}
    @endcan
    <div class="cleaner_h15"></div>
    {!!
    Table::withContents($users->items())
    ->striped()
    ->callback('Ações', function($field,$model){
        $linkEdit = route('users.edit',['user' => $model->id]);
        $linkShow = route('users.show',['user' => $model->id]);
        $linkRole = route('users.role',['user' => $model->id]);
        return Button::link(Icon::create('list-alt').' Papéis')->asLinkTo($linkRole).'&nbsp;&nbsp'.'|'.
            Button::link(Icon::create('pencil').' Editar')->asLinkTo($linkEdit).'&nbsp;&nbsp'.'|'.
                Button::link(Icon::create('folder-open').'&nbsp;&nbsp;Ver')->asLinkTo($linkShow);
    })
    !!}
    <div class="cleaner_h15"></div>
    {!! $users->links() !!}
@endsection