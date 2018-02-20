
@component('form._form_group',['field' => 'image'])
    {{ Form::label('image', 'Imagem',['class' => 'control-label']) }}
    {{ Form::file('image', null,['class' => 'form-control'])}}
@endcomponent

@component('form._form_group',['field' => 'title'])
    {{ Form::label('title','Título',['class' => 'control-label']) }}
    {{ Form::text('title',null,['class' => 'form-control']) }}
@endcomponent

@component('form._form_group',['field' => 'year'])
    {{ Form::label('year','Ano',['class' => 'control-label']) }}
    {{ Form::text('year',null,['class' => 'form-control']) }}
@endcomponent

@component('form._form_group',['field' => 'description'])
    {{ Form::label('description','Descrição',['class' => 'control-label']) }}
    {{ Form::text('description',null,['class' => 'form-control']) }}
@endcomponent

<div class="cleaner_h15"></div>
<div class="checkbox">
    <label>
        {{ Form::checkbox('active') }} Ativa?
    </label>
</div>
<div class="cleaner_h15"></div>