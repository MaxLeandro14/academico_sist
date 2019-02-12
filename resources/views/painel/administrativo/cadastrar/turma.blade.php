@extends('adminlte::page')

@section('title', 'Painel Dashboard')

@section('content_header')
    <h1>Cadastro de Turma</h1>
@stop

@section('content')
@include('painel.templates.mensagens')
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Nova Turma</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form action="{{ route('cadastra_turma') }}" method="POST" >
    {{csrf_field()}}
    @include('painel.templates.turma')
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label>Professores</label>
            <select required class="form-control select2_professores" multiple="multiple" name="professores[]">
              @foreach($disciplinas_professores->disciplina as $key => $disciplina_professor)
              <option value="{{ $disciplina_professor->id }},{{ $disciplina_professor->id }},{{ $disciplina_professor->professor[$key]->id }}">{{ $disciplina_professor->professor[$key]->codigo_professor }} - {{ $disciplina_professor->professor[$key]->id_funcionario }} - {{ $disciplina_professor->disciplina[$key]->nome_disciplina }}
              </option>
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
  <div class="div-table">
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
          <a  class="" data-toggle="modal" data-target="#modal_template" title="Mais Detalhes" href="{{ route('mostra_turma',$turma->id) }}">{{ $turma->codigo_turma }}</a>
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

@include('painel.templates.modal')
@stop