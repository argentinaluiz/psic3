@extends('layouts.app')
@section('pag_title', 'Usuários - Editar Perfil')

@section('breadcrumb')
    <h2>Configurações</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar usuários' => route('users.index'), 'Editar perfil usuário' ))!!}
@endsection

@section('h5-title')
     <h5>Editar perfil de usuário</h5>
@endsection

@section('content')
    @component('admin.users.tabs-component',['user' => $form->getModel()])
        <div class="col-md-12">
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
@endsection

@section('extra-js')
    <script type="text/javascript">
        $('select[name=estado]').change(function () {
            var idState = $(this).val();
            if(idState){
                $.ajax({
                url: 'state/'+encodeURI(idState),
                type: "GET",
                dataType: "json",
                success:function(data) {
                    $('select[name="cidade"]').empty();
                    $.each(data, function(key, value) {
                        $('select[name="cidade"]').append('<option value=' + value.id + '>' + value.cidade + '</option>');
                    });
                }
            });
            }else{
            $('select[name="cidade"]').empty();
              }
        });
    </script>
@endsection