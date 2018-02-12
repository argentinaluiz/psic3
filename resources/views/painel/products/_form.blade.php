@component('form._form_group',['field' => 'name'])
    {{ Form::label('name','Nome',['class' => 'control-label']) }}
    {{ Form::text('name',null,['class' => 'form-control']) }}
@endcomponent

@component('form._form_group',['field' => 'slug'])
    {{ Form::label('slug','Nome abreviado',['class' => 'control-label']) }}
    {{ Form::text('slug',null,['class' => 'form-control']) }}
@endcomponent

@component('form._form_group',['field' => 'details'])
    {{ Form::label('details', 'Detalhes',['class' => 'control-label']) }}
    {{ Form::text('details', null,['class' => 'form-control'])}}
@endcomponent

@component('form._form_group',['field' => 'old_price'])
    {{ Form::label('old_price', 'Valor anterior',['class' => 'control-label']) }}
    {{ Form::text('old_price', null,['class' => 'form-control'])}}
@endcomponent

@component('form._form_group',['field' => 'price'])
    {{ Form::label('price', 'Valor vendido',['class' => 'control-label']) }}
    {{ Form::text('price', null,['class' => 'form-control'])}}
@endcomponent

@component('form._form_group',['field' => 'description'])
    {{ Form::label('description', 'Descrição',['class' => 'control-label']) }}
    {{ Form::text('description', null,['class' => 'form-control'])}}
@endcomponent

<div class="checkbox">
    <label>
        {{ Form::checkbox('featured') }} Destaque?
    </label>
</div>

<div class="checkbox">
    <label>
        {{ Form::checkbox('active') }} Ativo?
    </label>
</div>



