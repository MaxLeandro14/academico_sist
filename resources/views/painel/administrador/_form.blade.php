
<div class="form-group">
    <label>Nome do papel</label>
     <input type="text" name="nome" class="form-control" value="{{ isset($registro->nome) ? $registro->nome : '' }}" >
 </div>
 <div class="form-group">
    <label>Descrição</label>
     <input type="text" name="descricao" class="form-control" value="{{ isset($registro->descricao) ? $registro->descricao : '' }}">
 </div>