@component('form._form_group',['field' => 'title'])
    {{ Form::label('title', 'Título',['class' => 'control-label']) }}
    {{ Form::text('title', null,['class' => 'form-control'])}}
@endcomponent


@component('form._form_group',['field' => 'description'])
    {{ Form::label('description', 'Descrição',['class' => 'control-label']) }}
    {{ Form::text('description', null,['class' => 'form-control'])}}
@endcomponent


<div class="file-field input-field">
  <div class="btn">
    <span>Carregar imagens</span>
    <input type="file" multiple name="imagens[]">
  </div>
  <div class="file-path-wrapper">
    <input class="file-path validate" type="text">
  </div>
</div>

