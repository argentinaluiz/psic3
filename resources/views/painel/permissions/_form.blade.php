@component('form._form_group',['field' => 'name'])
    {{ Form::label('name','Nome',['class' => 'control-label']) }}
    {{ Form::text('name',null,['class' => 'form-control']) }}
@endcomponent


@component('form._form_group',['field' => 'description'])
    {{ Form::label('description', 'Descrição',['class' => 'control-label']) }}
    {{ Form::text('description', null,['class' => 'form-control'])}}
@endcomponent

@forelse ($roles as $role)
   @component('form._form_group',['field' => 'role_id'])
        {{ Form::label('role_id', 'Papéis',['class' => 'control-label']) }}
        {{
            Form::checkbox('roles[]', $role->id, null,['class' => 'form-control'])
        }}
    @endcomponent
    @empty
@endforelse


