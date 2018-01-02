@component('form._form_group',['field' => 'name'])
    {{ Form::label('name','Paciente',['class' => 'control-label']) }}
    {{ Form::text('name',null,['class' => 'form-control']) }}
@endcomponent

@component('form._form_group',['field' => 'name'])
    {{ Form::label('name','Agenda',['class' => 'control-label']) }}
    {{ Form::text('name',null,['class' => 'form-control']) }}
@endcomponent

@component('form._form_group',['field' => 'date_reserved'])
    {{ Form::label('date_reserved', 'Data reservada',['class' => 'control-label']) }}
    {{ Form::date('date_reserved', null,['class' => 'form-control'])}}
@endcomponent

@component('form._form_group',['field' => 'status'])
    {{ Form::label('status', 'Tipo',['class' => 'control-label']) }}
    {{
        Form::select('status', [
            '' => 'Selecione o status',
            1 => 'Reservado',
            2 => 'Cancelado',
            3 => 'Pago',
            4 => 'Aguardando'
        ],null,['class' => 'form-control'])
    }}
@endcomponent


