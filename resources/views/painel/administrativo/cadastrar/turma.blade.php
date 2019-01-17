@extends('adminlte::page')

@section('title', 'Painel Dashboard')

@section('content_header')
    <h1>Cadastro de Turma</h1>
@stop

@section('content')

<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Nova Turma</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form role="form">
    <div class="box-body">

      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="">Data de Início</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
              <input type="date" class="form-control" placeholder="Data de início" name="data_inicial">
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="">Data Final</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
              <input type="date" class="form-control" placeholder="Data de início" name="data_final">
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-3">
          <div class="form-group">
            <label>Nível</label>
            <select class="form-control select2" name="serie" id="serie" onselect="hide();">
              <option value="Fundamental 1">Fundamental 1</option>
              <option value="Fundamental 2">Fundamental 2</option>
              <option>Médio</option>
            </select>
          </div>
        </div>

        <div class="col-md-2">
          <div class="form-group">
            <label>Ano</label>
            <select class="form-control select2" name="ano" id="ano">
              <option>1° ano</option>
              <option>2° ano</option>
              <option>3° ano</option>
              <option>4° ano</option>
              <option>5° ano</option>
              <option>6° ano</option>
              <option>7° ano</option>
              <option>8° ano</option>
              <option>9° ano</option>
            </select>
          </div>
        </div>

        <div class="col-md-2">
          <div class="form-group">
            <label>Turno</label>
            <select class="form-control select2" name="turno">
              <option>Matutino</option>
              <option>Vespertino</option>
              <option>Noturno</option>
            </select>
          </div>
        </div>

        <div class="col-md-5">
          <label for="">Descrição</label>
          <div class="input-group">
            <textarea rows="5" cols="180" class="form-control" placeholder="" name="descricao"></textarea>
          </div>    
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label>Professores</label>
            <select class="form-control select2" multiple="" name="turno">
              @foreach($professores as $professor)
              <option>{{ $professor->nome_professor }}</option>
              @endforeach
            </select>
          </div>
        </div>
      </div>

    </div>
    <!-- /.box-body -->

    <div class="box-footer">
      <button type="submit" class="btn btn-primary">Salvar</button>
      <a type="button" class="btn btn-default">Voltar</a>
    </div>
  </form>
</div>
<script type="text/javascript">
function hide(){
  var valor = document.getElementById("serie").value;
  alert(valor);
  /*if(valor == 'Funcionário'){
    $("#matricula").show();
    $("#setor").show();
    $("#curso").hide();
  }
  if(valor == 'Aluno'){
    $("#curso").show();
    $("#matricula").show();
    $("#setor").hide();
  }
  if(valor == 'Programas Especiais' || valor == 'Comunidade' || valor == 'Dependente'){
    $("#curso").hide();
    $("#matricula").hide();
    $("#setor").hide();
  }*/

  };
</script>
@stop