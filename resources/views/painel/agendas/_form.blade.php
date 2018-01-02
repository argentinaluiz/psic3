@component('form._form_group',['field' => 'client_clinic_id'])
    {{ Form::label('client_clinic_id','Escolha a clínica',['class' => 'control-label']) }}
    {{ Form::select('client_clinic_id',$clients,null,['class' => 'form-control'])}}
@endcomponent

@component('form._form_group',['field' => 'room_id'])
    {{ Form::label('room_id','Escolha a sala',['class' => 'control-label']) }}
    {{ Form::select('room_id',$rooms,null,['class' => 'form-control'])}}
@endcomponent

@component('form._form_group',['field' => 'client_psychoanalyst_id'])
    {{ Form::label('client_psychoanalyst_id','Escolha o psicanalista',['class' => 'control-label']) }}
    {{ Form::select('client_psychoanalyst_id',$clients,null,['class' => 'form-control'])}}
@endcomponent

@component('form._form_group',['field' => 'date'])
    {{ Form::label('date', 'Data',['class' => 'control-label']) }}
    {{ Form::date('date', null,['class' => 'form-control'])}}
@endcomponent

@component('form._form_group',['field' => 'time'])
    {{ Form::label('time', 'Horário',['class' => 'control-label']) }}
    {{ Form::time('time', null,['class' => 'form-control'])}}
@endcomponent

@component('form._form_group',['field' => 'old_price'])
    {{ Form::label('old_price', 'Preço anterior',['class' => 'control-label']) }}
    {{ Form::text('old_price', null,['class' => 'form-control'])}}
@endcomponent

@component('form._form_group',['field' => 'price'])
    {{ Form::label('price', 'Preço',['class' => 'control-label']) }}
    {{ Form::text('price', null,['class' => 'form-control'])}}
@endcomponent

@component('form._form_group',['field' => 'stallments'])
    {{ Form::label('stallments', 'Total de Parcelas',['class' => 'control-label']) }}
    {{ Form::number('stallments', null,['class' => 'form-control'])}}
@endcomponent

<div class="checkbox">
    <label>
        {{ Form::checkbox('is_promotion') }} É promoção?
    </label>
</div>

@component('form._form_group',['field' => 'qty_sessions'])
    {{ Form::label('qty_sessions', 'Quantidade de sessões',['class' => 'control-label']) }}
    {{ Form::number('qty_sessions', null,['class' => 'form-control'])}}
@endcomponent

@component('form._form_group',['field' => 'description'])
    {{ Form::label('description', 'Descrição',['class' => 'control-label']) }}
    {{ Form::textarea('description', null,['class' => 'form-control'])}}
@endcomponent