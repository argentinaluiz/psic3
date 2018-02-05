@extends('layouts.app')
@section('pag_title', 'Usuários - Mostrar')

@section('breadcrumb')
    <h2>Configurações</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar usuários' => route('users.index'), 'Detalhes dos usuários' ))!!}
@endsection

@section('h5-title')
     <h5>Ver usuário</h5>
@endsection


@section('content')
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
   
@endsection