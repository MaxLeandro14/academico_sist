@extends('adminlte::page')

@section('title', 'Painel Dashboard')

@section('content_header')
    <h1>Informações da Turma</h1>
@stop

@section('content')

<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Turma - {{ $turma_info[0]->descricao }} - {{ $turma_info[0]->codigo_turma }}  </h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form action="{{ route('matricula_aluno',$turma_info[0]->id) }}" method="POST" >
    {{csrf_field()}}
    <input type="hidden" name="id_turma" value="{{$turma_info[0]->id}}">
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
                    <th>CPF</th>
                    <th>Aluno</th>
                    <th>Situação</th>
                  </tr>
                </thead>

                <tbody>
                  @foreach($alunos_turma as $aluno)
                  <tr>
                    <td> {{ $aluno->cpf }} </td>
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
                  @foreach($turma_info as $turma)
                  <tr>
                    <td> {{ $turma->codigo_professor }} </td>
                    <td> {{ $turma->nome }} </td>
                    <td> {{ $turma->nome_disciplina }} </td>
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