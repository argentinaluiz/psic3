@extends('layouts.app')
@section('pag_title', 'Ver Categoria')

@section('breadcrumb')
    <h2>Pesquisas</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar categorias' => route('categories.index'), 'Detalhes da categoria' ))!!}
@endsection

@section('h5-title')
     <h5>Ver categoria</h5>
@endsection


@section('content')
    @php
        $linkEdit = route('categories.edit',['category' => $category->id]);
        $linkDelete = route('categories.destroy',['category' => $category->id]);
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
            <td>{{$category->id}}</td>
        </tr>
        <tr>
            <th scope="row">Nome</th>
            <td>{{$category->name}}</td>
        </tr>
        <tr>
            <th scope="row">Abreviação</th>
            <td>{{$category->slug}}</td>
        </tr>
        </tbody>
    </table>

@endsection
