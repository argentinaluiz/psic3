@extends('layouts.app')
@section('pag_title', 'Classes - Mostrar')

@section('content')
    <div class="container">
        {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar classes' => route('class_informations.index'), 'Detalhes da classe' ))!!}
        <div class="row">
            <div class="col-md-12">
                <h3>Ver classe</h3>
                <div class="cleaner_h25"></div>
                @php
                    $linkEdit = route('class_pacients.edit',['class_pacients' => $class_information->id]);
                    $linkDelete = route('class_pacients.destroy',['class_pacients' => $class_information->id]);
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
                        <td>{{$class_information->id}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Data Início</th>
                        <td>{{$class_information->date_start->format('d/m/Y')}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Data Fim</th>
                        <td>{{$class_information->date_start->format('d/m/Y')}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Nome</th>
                        <td>{{$class_information->name}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Semester</th>
                        <td>{{$class_information->year}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
