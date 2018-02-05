@extends('layouts.app')
@section('pag_title', 'Usuários - Detalhes')

@section('breadcrumb')
    <h2>Configurações</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar usuários' => route('users.index'), 'Detalhes dos usuários' ))!!}
@endsection

@section('h5-title')
     <h5>Usuário - {{$user->name}}</h5>
@endsection


@section('content')
    {!! Button
            ::normal('Listar usuários')
            ->appendIcon(Icon::thList())
            ->asLinkTo(route('users.index'))
            ->addAttributes([
                'class' => 'hidden-print'
            ])
    !!}
    <div class="cleaner_h25"></div>
    <table class="table table-bordered">
        <tbody>
        <tr>
            <th scope="row">#</th>
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
        <tr>
            <th scope="row">Password</th>
            <td>{!! Badge::withContents($user->password)!!}</td>
        </tr>
        </tbody>
    </table>
@endsection
