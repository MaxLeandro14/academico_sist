@extends('adminlte::page')

@section('title', 'Painel Dashboard')

@section('content_header')
    <h1>Informações da Turma</h1>
@stop

@section('content')

<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Turma - {{ $turma_info->descricao }} - {{ $turma_info->codigo_turma }}  </h3>
    <div class="pull-right"><a class="btn btn-default" href=""><i class="fa fa-refresh"></i> Atualizar</a></div>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form action="{{ route('matricula_aluno',$turma_info->id) }}" method="POST" >
    {{csrf_field()}}
    <input type="hidden" name="id_turma" value="{{$turma_info->id}}">
    @include('painel.templates.turma')
    <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label>Adicione Alunos à Turma</label>
            <select class="form-control select2_aluno" multiple="multiple" name="id_alunos[]">
              @foreach($todos_alunos as $aluno)
              <option value="{{ $aluno->id }}">
                {{ $aluno->cpf }} - {{ $aluno->nome_aluno }} - {{ $aluno->situacao_procedencia }}
              </option>
              @endforeach
            </select>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
                <br><br>
              <div class="box-header with-border">
                <h3 class="box-title">Alunos da Turma</h3>
              </div>  
              <div>
                <table id="tabela" class="table tabela" pageLength='5' aaSorting='0 asc'>
                <thead>
                  <tr>
                    <th>Código</th>
                    <th>Aluno</th>
                    <th>Situação</th>
                  </tr>
                </thead>

                <tbody>
                  @foreach($alunos_turma as $aluno)
                  <tr>
                    <td> {{ $aluno->codigo_aluno }} </td>
                    <td> {{ $aluno->nome_aluno }} </td>
                    <td> {{ $aluno->situacao_procedencia }} </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            
          </div>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
                <br><br>
              <div class="box-header with-border">
                <h3 class="box-title">Professores da Turma</h3>
              </div>  
              <div>
                <table id="tabela" class="table tabela" pageLength='5' aaSorting='0 asc'>
                <thead>
                  <tr>
                    <th>Código</th>
                    <th>Professor</th>
                    <th>Disciplina</th>
                  </tr>
                </thead>

                <tbody>
                  @foreach($professores_turma as $professor)
                  <tr>
                    <td> {{ $professor->codigo_professor }} </td>
                    <td> {{ $professor->nome }} </td>
                    <td> {{ $professor->nome_disciplina }} </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            
          </div>
        </div>
      </div>

    </div>
    <!-- /.box-body -->

    <div class="box-footer">
      <button type="submit" class="btn btn-primary">Salvar</button>
      <a type="button" class="btn btn-default" href="{{ route('matricular_aluno') }}">Voltar</a>
    </div>
  </form>
</div>
@stop