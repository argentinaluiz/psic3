@extends('layouts.app')
@section('pag_title', 'Ver Especialidade')

@section('breadcrumb')
    <h2>Configurações</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar especialidades' => route('specialties.index'), 'Detalhes da especialidade' ))!!}
@endsection

@section('h5-title')
     <h5>Ver especialidade</h5>
@endsection


@section('content')
    @php
        $linkEdit = route('specialties.edit',['specialty' => $specialty->id]);
        $linkDelete = route('specialties.destroy',['specialty' => $specialty->id]);
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
            <td>{{$specialty->id}}</td>
        </tr>
        <tr>
            <th scope="row">Nome</th>
            <td>{{$specialty->name}}</td>
        </tr>
        </tbody>
    </table>

@endsection
