@extends('layouts.app')
@section('pag_title', 'Usuários - Detalhes')

@section('content')
    <div class="container">
        {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar usuários' => route('users.index'), 'Detalhes dos usuários' ))!!}
        <div class="row">
            <div class="col-md-12">
                <h3>Usuário - {{$user->name}}</h3>
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
            </div>
        </div>
    </div>
@endsection
