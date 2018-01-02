

@component('form._form_group',['field' => 'class_room'])
    {{ Form::label('class_room', 'Tipo de Sala',['class' => 'control-label']) }}
    {{
        Form::select('class_room', [
            '' => 'Selecione o tipo de sala',
            1 => 'Online',
            2 => 'Casal',
            3 => 'Divã',
            4 => 'Criança',
            5 => 'Padrão'
        ],null,['class' => 'form-control'])
    }}
@endcomponent


@component('form._form_group',['field' => 'qty_pacients'])
    {{ Form::label('qty_pacients', 'Total de Pacientes',['class' => 'control-label']) }}
    {{ Form::number('qty_pacients', 1,['class' => 'form-control'])}}
@endcomponent


