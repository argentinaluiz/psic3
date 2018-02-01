@extends('layouts.app')
@section('pag_title', 'Usuários - Editar Perfil')

@section('content')
    <div class="container">
        {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar usuários' => route('users.index'), 'Editar perfil usuário' ))!!}
        <div class="row">
            <div class="col-md-12">
                @component('admin.users.tabs-component',['user' => $form->getModel()])
                    <div class="col-md-12">
                        <h3>Editar perfil</h3>
                        <div class="cleaner_h25"></div>
                        <?php $icon = Icon::create('pencil');?>
                        {!!
                            form($form->add('salve', 'submit', [
                                'attr' => ['class' => 'btn btn-primary btn-block'],
                                'label' => $icon.'&nbsp;&nbsp;Salvar'
                            ]))
                        !!}
                    </div>
                @endcomponent
            </div> 
        </div>
		<div class="cleaner_h25"></div>
    </div>
@endsection

@section('extra-js')
    <script type="text/javascript">
        $('select[name=state]').change(function () {
            var idState = $(this).val();
            $.get('get-cities/' + idState, function (cities) {
                $('select[name=city]').empty();
                $.each(cities, function (key, value) {
                    $('select[name=city]').append('<option value=' + value.id + '>' + value.city + '</option>');
                });
            });
        });
    </script>
@endsection