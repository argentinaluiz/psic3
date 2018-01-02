@component('form._form_group',['field' => 'name'])
    {{ Form::label('name','Nome',['class' => 'control-label']) }}
    {{ Form::text('name',null,['class' => 'form-control']) }}
@endcomponent


@component('form._form_group',['field' => 'label'])
    {{ Form::label('label', 'Label (descrição)',['class' => 'control-label']) }}
    {{ Form::text('label', null,['class' => 'form-control'])}}
@endcomponent


@component('form._form_group',['field' => 'user_id'])
    {{ Form::label('user_id', 'Usuários',['class' => 'control-label']) }}
    {{ Form::select('user_id', $users, null,['class' => 'form-control'])}}
@endcomponent

