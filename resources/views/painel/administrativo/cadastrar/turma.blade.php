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
  <form action="{{ route('cadastra_turma') }}" method="POST" >
    {{csrf_field()}}
    <div class="box-body">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="">Data de Início</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
              <input required type="date" class="form-control" placeholder="Data de início" name="data_inicial">
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="">Data Final</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
              <input required type="date" class="form-control" placeholder="Data de início" name="data_final">
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-3">
          <div class="form-group">
            <label>Nível</label>
            <select required class="form-control select2_nivel" required name="nivel" id="nivel" onselect="ano_serie();" onchange="ano_serie();">
              <option></option>
              <option>Fundamental 1</option>
              <option>Fundamental 2</option>
              <option>Médio</option>
            </select>
          </div>
        </div>

        <div class="col-md-2">
          <div class="form-group">
            <label>Ano</label>
            <select required class="form-control select2_serie" name="ano" id="ano">
              <option></option>
              <option id="id1">1° ano</option>
              <option id="id2">2° ano</option>
              <option id="id3">3° ano</option>
              <option id="id4">4° ano</option>
              <option id="id5">5° ano</option>
              <option id="id6">6° ano</option>
              <option id="id7">7° ano</option>
              <option id="id8">8° ano</option>
              <option id="id9">9° ano</option>
            </select>
          </div>
        </div>

        <div class="col-md-2">
          <div class="form-group">
            <label>Turno</label>
            <select required class="form-control select2_turno" name="turno">
              <option>Matutino</option>
            </select>
          </div>
        </div>

        <div class="col-md-5">
          <label for="">Descrição</label>
          <div class="input-group">
            <textarea required rows="5" cols="180" class="form-control" placeholder="Descrição da Turma"  name="descricao"></textarea>
          </div>    
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label>Professores</label>
            <select required class="form-control select2_professores" multiple="multiple" name="professores[]">
              @foreach($disciplinas_professores as $disciplina_professor)
              <option value="{{ $disciplina_professor->id }},{{ $disciplina_professor->id_disciplina }},{{ $disciplina_professor->id_professor }}" >{{ $disciplina_professor->codigo_professor }} - {{ $disciplina_professor->nome_professor }} - {{ $disciplina_professor->nome_disciplina }}</option>
              @endforeach
            </select>
          </div>
        </div>
      </div>

    </div>
    <!-- /.box-body -->

    <div class="box-footer">
      <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
  </form>
    <br><br>
  <div class="box-header with-border">
    <h3 class="box-title">Turmas cadastradas</h3>
  </div>  
  <div style=" margin:auto; width: 90%" >
    <table id="tabela" class="table tabela" pageLength='10' aaSorting='0 asc'>
    <thead>
      <tr>
        <th>Código</th>
        <th>Nível</th>
        <th>Ano</th>
        <th>Turno</th>
        <th>Ano Letivo</th>
      </tr>
    </thead>

    <tbody>
      @foreach($turmas as $turma)
      <tr>
        <td>
          <a  class="" data-toggle="modal" data-target="#modal_template" title="Mais Detalhes" href="{{ route('mostra_turma',$turma->codigo_turma) }}">{{ $turma->codigo_turma }}</a>
        </td>
        <td>{{ $turma->nivel }}</td>
        <td>{{ $turma->ano }}</td>
        <td>{{ $turma->turno }}</td>
        <td>{{ $turma->ano_letivo }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
<br>
</div>

@include('painel.administrativo.templates.modal')
@stop