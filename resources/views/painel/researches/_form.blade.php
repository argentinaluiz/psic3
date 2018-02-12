
@component('form._form_group',['field' => 'title'])
    {{ Form::label('title','Título',['class' => 'control-label']) }}
    {{ Form::text('title',null,['class' => 'form-control']) }}
@endcomponent

@component('form._form_group',['field' => 'description'])
    {{ Form::label('description','Descrição',['class' => 'control-label']) }}
    {{ Form::text('description',null,['class' => 'form-control']) }}
@endcomponent

@component('form._form_group',['field' => 'year'])
    {{ Form::label('year','Ano',['class' => 'control-label']) }}
    {{ Form::text('year',null,['class' => 'form-control']) }}
@endcomponent

<div class="input-field col s6">
    <select multiple name="novasCategorias[]">
      @if(isset($registro->categories) && $registro->categories()->count())
        @foreach($categories as $key => $value)
          <option {{ $registro->categories->contains($value) ? 'selected' : '' }}  value="{{$value->id}}">{{$value->name}}</option>
        @endforeach
      @elseif(old('novasCategorias'))
        @foreach($categories as $key => $value)
          <?php $existe = false; ?>
          @foreach(old('novasCategorias') as $key2 => $value2)
            @if($value2 == $value->id)
              <?php $existe = true; ?>
            @endif
          @endforeach
          @if($existe)
            <option selected  value="{{$value->id}}">{{$value->name}}</option>
          @else
            <option  value="{{$value->id}}">{{$value->name}}</option>
          @endif
        @endforeach
      @else
        <option value="" disabled selected>Nenhuma</option>
        @foreach($categories as $key => $value)
          <option  value="{{$value->id}}">{{$value->name}}</option>
        @endforeach
      @endif


    </select>
    <label>Categorias</label>
  </div>

<div class="checkbox">
    <label>
        {{ Form::checkbox('active') }} Ativo?
    </label>
</div>