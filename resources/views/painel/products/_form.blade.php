<div class="input-field">
	<input type="text" name="name" id="name" value="{{ isset($registro->name) ? $registro->name : null }}">
	<label for="name">Nome</label>
</div>
<div class="input-field">
	<textarea type="text" name="description" id="description" class="materialize-textarea">{{ isset($registro->description) ? $registro->description : null }}</textarea>
	<label for="description">Descrição</label>
</div>
<div class="input-field">
	<input type="text" name="image" id="image" value="{{ isset($registro->image) ? $registro->image : null }}">
	<label for="image">Imagem</label>
</div>
<div class="input-field">
	<input type="text" name="value" id="value" value="{{ isset($registro->value) ? $registro->value : null }}">
	<label for="value">Valor</label>
</div>
<div class="input-field">
    <div class="row">
        <label for="active">Ativo</label>
    </div>
    <div class="row">
      <input name="active" type="radio" id="active-s" value="S" {{ isset($registro->active) && $registro->active == 'S' ? ' checked="checked"' : null }} required="required" />
      <label for="active-s">Sim</label>
      <input name="active" type="radio" id="active-n" value="N" {{ isset($registro->active) && $registro->active == 'N' ? ' checked="checked"' : null }} required="required"  />
      <label for="active-n">Não</label>
    </div>
</div>