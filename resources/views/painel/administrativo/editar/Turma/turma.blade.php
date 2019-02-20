@extends('adminlte::page')

@section('title', 'Painel Dashboard')

@section('content_header')
    <h1>Editar Turma</h1>
@stop

@section('content')

<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Turma - {{ $turma_info->descricao }} - {{ $turma_info->codigo_turma }}  </h3>
    <div class="pull-right"><a class="btn btn-default" href=""><i class="fa fa-refresh"></i> Atualizar</a></div>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form action="{{ route('salva_turma',$turma_info->id) }}" method="POST" >
    {{csrf_field()}}
    <input type="hidden" name="id_turma" value="{{$turma_info->id}}">
    @include('painel.templates.turma')
    <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label>Professores</label>
            <select required class="form-control select2_professores" multiple="multiple" name="professores[]">
              @foreach($professores as $professor)
              <option value="{{$professor->id_disciplina_professor}},{{ $professor->id_professor }},{{ $professor->id_disciplina }},{{ $professor->id_professor }}" >{{ $professor->codigo_professor }} - {{ $professor->nome }} - {{ $professor->nome_disciplina }}
              </option>
              @endforeach
            </select>
          </div>
        </div>
      </div>
  <!-- /.box-body -->

    <div class="box-footer">
      <button type="submit" class="btn btn-primary">Salvar</button>
      <a type="button" class="btn btn-default" href="{{ route('matricular_aluno') }}">Voltar</a>
    </div>
    </form>
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
                    <th>Ação</th>
                  </tr>
                </thead>

                <tbody>
                  @foreach($professores_turma as $professor)
                  <tr>
                    <td> {{ $professor->codigo_professor }} </td>
                    <td> {{ $professor->nome }} </td>
                    <td> {{ $professor->nome_disciplina }} </td>
                    <td>
                      <form action="" method="POST">
                        {{csrf_field()}}
                        <input type="hidden" name="id_professor" value="{{ $professor->id_professor }}">
                        <button title="Remover Aluno" class="form-control btn btn-danger">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                      </button> 
                      </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            
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
                <table id="tabela" class="table tabela" pageLength='5' aaSorting='1 asc'>
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
    </div>
  
</div>
@stop