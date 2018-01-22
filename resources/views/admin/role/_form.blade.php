<div class="input-field">
	<input type="text" name="nome" class="validade" value="{{ isset($registro->name) ? $registro->name : '' }}">
	<label>Nome do papel</label>
</div>

<div class="input-field">
	<input type="text" name="descricao" class="validade" value="{{ isset($registro->description) ? $registro->description : '' }}">
	<label>Descrição</label>
</div>


