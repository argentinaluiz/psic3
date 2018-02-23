@component('form._form_group',['field' => 'title'])
    {{ Form::label('title', 'Título',['class' => 'control-label']) }}
    {{ Form::text('title', null,['class' => 'form-control'])}}
@endcomponent


@component('form._form_group',['field' => 'description'])
    {{ Form::label('description', 'Descrição',['class' => 'control-label']) }}
    {{ Form::text('description', null,['class' => 'form-control'])}}
@endcomponent

@component('form._form_group',['field' => 'file'])
    {{ Form::label('file', 'Arquivos',['class' => 'control-label']) }}
    {{ Form::file('file', null,['class' => 'form-control'])}}
@endcomponent


