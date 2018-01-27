@extends('layouts.app')
@section('pag_title', 'Usuários - Mostrar')

@section('content')
<div class="container">
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar usuários' => route('users.index'), 'Detalhes dos usuários' ))!!}
    <div class="row">
        <div class="col-md-12">
            <h3>Ver usuário</h3>
            <div class="cleaner_h25"></div>
            @php
                $linkEdit = route('users.edit',['user' => $user->id]);
                $linkDelete = route('users.destroy',['user' => $user->id]);
            @endphp
            {!! Button::primary(Icon::pencil().' Editar')->asLinkTo($linkEdit) !!}
            {!!
             Button::danger(Icon::remove().' Excluir')->asLinkTo($linkDelete)
                ->addAttributes([
                    'onclick' => 'event.preventDefault();if(confirm("Deseja excluir?")){document.getElementById("form-delete").submit();}'
                ])
            !!}
            @php
                $formDelete = FormBuilder::plain([
                    'id' => 'form-delete',
                    'url' => $linkDelete,
                    'method' => 'DELETE',
                    'style' => 'display:none'
                ])
            @endphp
            {!! form($formDelete) !!}

            <br/><br/>
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <th scope="row">ID</th>
                    <td>{{$user->id}}</td>
                </tr>
                <tr>
                    <th scope="row">Nome</th>
                    <td>{{$user->name}}</td>
                </tr>
                <tr>
                    <th scope="row">E-mail</th>
                    <td>{{$user->email}}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>    
@endsection