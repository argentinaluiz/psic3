@extends('layouts.app')
@section('pag_title', 'Usuários')

@section('content')
<div class="container">
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar usuários' => route('users.index')))!!}
	
    <div class="row">
        <div class="col-md-12">
            <h3>Listagem de usuários</h3>
            <span class="pull-right small text-muted">Total de usuários: {{ $totalUsers }} </span>
            <br/>
			{!! Button::primary(Icon::create('plus').' Novo usuário')->asLinkTo(route('users.create')) !!}
           
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

        </div>
    </div>
	{!! $users->links() !!}
</div>

@endsection