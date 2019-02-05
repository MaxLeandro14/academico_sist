@extends('adminlte::page')

@section('title', 'Painel Dashboard')

@section('content_header')
    <h1>Detalhes da Turma</h1>
@stop

@section('content')

<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Diário do professor:
    <form method="POST" action="{{ route('muda_bimestre') }}" >
      <select required class="form-control " id="bimestre" name="bimestre">
        <option><strong>1° Bimestre</strong></option>
        <option><strong>2° Bimestre</strong></option>
        <option><strong>3° Bimestre</strong></option>
        <option><strong>4° Bimestre</strong></option>
      </select>
      <div id="div_bimestre"></div>
      <script type="text/javascript">
        document.getElementById('bimestre').addEventListener('change', function() {
          var bimestre = $('#bimestre').val();
          alert(bimestre);
          var div = $("#div_bimestre");
          var html = '<input type="hidden" name="bimestre" value="';
          html = html.concat(bimestre);
          html = html.concat('">');
          div.html(html);
          this.form.submit();
        }); 
      </script>
    </form>
   </h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  
  <form role="form">
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
          <th>Nome</th>
          <th>Notas</th><!--
          <th>Nota 2</th>
          <th>Nota 3</th>
          <th>Nota 4</th>-->
          </tr>
        </thead>

        <tbody>
          @foreach($alunos_turma as $aluno)
            <tr>
              <td>{{ $aluno->codigo_aluno }}</td>
              <td>{{ $aluno->nome_aluno }}</td>
              <td>
              @foreach($notas_alunos as $nota_aluno)
              @if($aluno->id_aluno == $nota_aluno->id_aluno && $turma_info->id_disciplina == $nota_aluno->id_disciplina)
              <input type="" style="width: 10%" value="{{ $nota_aluno->avaliacao_etapa1 }}"  name="">
              <!--<input type="" value="{{ $nota_aluno->atividade_etapa1 }}" name="">
              <input type="" value="{{ $nota_aluno->trabalhos_etapa1 }}" name="">-->
              @endif
              @endforeach
              </td>
            </tr>
            @endforeach
          </tbody>
      </table>
    </div>
  </form>

</div>
@stop