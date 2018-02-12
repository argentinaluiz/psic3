@component('form._form_group',['field' => 'title'])
    {{ Form::label('title','Título',['class' => 'control-label']) }}
    {{ Form::text('title',null,['class' => 'form-control']) }}
@endcomponent

@component('form._form_group',['field' => 'description'])
    {{ Form::label('description', 'Descrição',['class' => 'control-label']) }}
    {{ Form::text('description', null,['class' => 'form-control'])}}
@endcomponent

@component('form._form_group',['field' => 'order'])
    {{ Form::label('order', 'Ordem',['class' => 'control-label']) }}
    {{ Form::text('order', null,['class' => 'form-control'])}}
@endcomponent
