@component('form._form_group',['field' => 'name'])
    {{ Form::label('name','Nome',['class' => 'control-label']) }}
    {{ Form::text('name',null,['class' => 'form-control']) }}
@endcomponent


@component('form._form_group',['field' => 'label'])
    {{ Form::label('label', 'Label (descrição)',['class' => 'control-label']) }}
    {{ Form::text('label', null,['class' => 'form-control'])}}
@endcomponent

@component('form._form_group',['field' => 'permission_id'])
    {{ Form::label('permission_id', 'Permissões',['class' => 'control-label']) }}
    {{
        Form::checkbox('permission_id', $permissions, null,['class' => 'form-control'])
    }}
@endcomponent

