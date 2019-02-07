@extends('adminlte::page')

@section('title', 'Painel Dashboard')

@section('content_header')
    <h1>Detalhes da Turma</h1>
@stop

@section('content')

<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Diário do professor
    <form method="POST" action="{{ route('muda_bimestre',[$turma_info->id,$turma_info->id_disciplina]) }}" >
      {{csrf_field()}}
      <select required class="form-control select2_generico" id="bimestre">
        @foreach($bimestres as $bimestre)
        <option @if(session('bimestre_selecionado') == $bimestre ) selected @endif  value="{{$bimestre}}" >
          <strong>{{$bimestre}}° Bimestre</strong>
        </option>
        @endforeach
      </select>
      <div id="div_bimestre_form1"></div>
    </form>
   </h3>
   <div class="pull-right"><a class="btn btn-default" href=""><i class="fa fa-refresh"></i> Atualizar</a></div>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  
  <form role="form" method="POST" action="{{ route('salva_notas',[$turma_info->id,$turma_info->id_disciplina]) }}">
    {{csrf_field()}}
    <div class="box-body">
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label for="">Professor</label>
            <input disabled type="text" class="form-control" value="{{ $turma_info->nome_professor }}" >
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label for="">Disciplina</label>
            <input disabled type="text" class="form-control" value="{{ $turma_info->nome_disciplina }}">
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">
            <label for="">Nível</label>
            <input disabled type="text" class="form-control" value="{{ $turma_info->nivel }}">
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">
            <label for="">Turno</label>
            <input disabled type="text" class="form-control" value="{{ $turma_info->turno }}">
          </div>
        </div>
        <div class="col-md-1">
          <div class="form-group">
            <label for="">Ano</label>
            <input disabled type="text" class="form-control" value="{{ $turma_info->ano }}">
          </div>
        </div>
      </div>
      
      <div class="row">
        <div class="col-md-3">
          <div class="form-group">
            <label for="">Data de início</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
              <input disabled type="date" class="form-control" placeholder="Data de início" name="data_nascimento" value="{{$turma_info->data_inicial}}">
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label for="">Data de Término</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
              <input disabled type="date" class="form-control" placeholder="Data de início" name="data_nascimento" value="{{$turma_info->data_final}}">
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Descrição</label>
            <input type="text" required class="form-control" placeholder="Descrição da Turma"  name="descricao" disabled value="{{ $turma_info->descricao }}">
          </div>    
        </div>
      </div>
      <hr>
      <table id="tabela" class="table tabela" pageLength='10' aaSorting='1 asc'>
        <thead>
          <tr>
          <th>Código</th>
          <th class="nome_aluno">Nome</th>
          <th>Etapa 1</th>
          <th>Etapa 2</th>
          </tr>
        </thead>
        <tbody>
          @foreach($alunos_turma as $aluno)
            <tr>
              <td>{{ $aluno->codigo_aluno }}</td>
              <td>{{ $aluno->nome_aluno }}</td>
              @foreach($notas_alunos as $nota_aluno)
              @if($aluno->id_aluno == $nota_aluno->id_aluno)
              <td>
              <input type="" class="form-control nota" placeholder="Avaliação" value="{{ $nota_aluno->avaliacao_etapa1 }}"  name="avaliacao_etapa1,{{$aluno->id_aluno}}">
              <input type="" class="form-control nota" placeholder="Atividade" value="{{ $nota_aluno->atividade_etapa1 }}" name="atividade_etapa1,{{$aluno->id_aluno}}">
              <input type="" class="form-control nota" placeholder="Trabalhos" value="{{ $nota_aluno->trabalhos_etapa1 }}" name="trabalhos_etapa1,{{$aluno->id_aluno}}">
              </td>
              <td>
              <input type="" class="form-control nota" placeholder="Avaliação" value="{{ $nota_aluno->avaliacao_etapa2 }}"  name="avaliacao_etapa2,{{$aluno->id_aluno}}">
              <input type="" class="form-control nota" placeholder="Atividade" value="{{ $nota_aluno->atividade_etapa2 }}" name="atividade_etapa2,{{$aluno->id_aluno}}">
              <input type="" class="form-control nota" placeholder="Trabalhos" value="{{ $nota_aluno->trabalhos_etapa2 }}" name="trabalhos_etapa2,{{$aluno->id_aluno}}">
              </td>
              @endif
              @endforeach
              </td>
            </tr>
            @endforeach
          </tbody>
      </table>
    </div>
    <div id="div_bimestre_form2"></div>
    <div class="box-footer">
      <button type="submit" id="salva" class="btn btn-primary">Salvar</button>
    </div>
  </form>

</div>

@stop