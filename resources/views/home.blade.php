@extends('layouts.app')
@section('pag_title', 'Usuários')

@section('breadcrumb')
    <h2>Geral</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar chamados' => route('home')))!!}
@endsection

@section('h5-title')
     <h5>Lista de Chamados</h5>
@endsection