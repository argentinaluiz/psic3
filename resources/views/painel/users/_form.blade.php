@component('form._form_group',['field' => 'name'])
    {{ Form::label('name','Nome',['class' => 'control-label']) }}
    {{ Form::text('name',null,['class' => 'form-control']) }}
@endcomponent

@component('form._form_group',['field' => 'email'])
    {{ Form::label('email', 'E-mail',['class' => 'control-label']) }}
    {{ Form::email('email', null,['class' => 'form-control'])}}
@endcomponent

@component('form._form_group',['field' => 'password'])
    {{ Form::label('password', 'Senha',['class' => 'control-label']) }}
    {{ Form::password('password', null,['class' => 'form-control'])}}
@endcomponent