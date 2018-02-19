@extends('layouts.app')
@section('pag_title', 'Produto - Mostrar')

@section('breadcrumb')
    <h2>Pesquisas</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar pesquisas' => route('researches.index'), 'Ver pesquisa' ))!!}
@endsection

@section('h5-title')
     <h5>Ver Pesquisa</h5>
@endsection

@section('content')
     @php
        $linkEdit = route('researches.edit',['research' => $research->id]);
        $linkDelete = route('researches.destroy',['research' => $research->id]);
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
            <th scope="row">Título</th>
            <td>{{$research->title}}</td>
        </tr>
        <tr>
            <th scope="row">Ano</th>
            <td>{{$research->year}}</td>
        </tr>
         <tr>
            <th scope="row">Categorias</th>
            <td> {{$research->textCategories}}</td>
        </tr>
        <tr>
            <th scope="row">Descrição</th>
            <td>{{$research->description}}</td>
        </tr>
        <tr>
            <th scope="row">Ativa</th>
            <td>{{$research->active?'Sim': 'Não'}}</td>
        </tr>
        </tbody>
    </table>   
@endsection