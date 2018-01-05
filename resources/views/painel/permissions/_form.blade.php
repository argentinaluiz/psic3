@component('form._form_group',['field' => 'name'])
    {{ Form::label('name','Nome',['class' => 'control-label']) }}
    {{ Form::text('name',null,['class' => 'form-control']) }}
@endcomponent


@component('form._form_group',['field' => 'label'])
    {{ Form::label('label', 'Descrição',['class' => 'control-label']) }}
    {{ Form::text('label', null,['class' => 'form-control'])}}
@endcomponent

@forelse ($rules as $rule)
   @component('form._form_group',['field' => 'rule_id'])
        {{ Form::label('rule_id', 'Papéis',['class' => 'control-label']) }}
        {{
            Form::checkbox('rules[]', $rule->id, null,['class' => 'form-control'])
        }}
    @endcomponent
    @empty
@endforelse


