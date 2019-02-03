@extends('adminlte::page')

@section('title', 'Painel Dashboard')

@section('content_header')
<h1>Declaração de Vínculo</h1>
@stop

@section('content')

     <div class="box">
            <div class="box-header">
              <h3 class="box-title">Lista de Alunos ativos</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Código</th>
                  <th>Aluno</th>
                  <th>Nome da Mãe</th>
                  <th>Data de Nascimento</th>
                  <th>Declaração</th>
                </tr>
                </thead>
                <tbody>

              @foreach($todos_alunos as $aluno)
                <tr>
                  <td>{{$aluno->codigo_aluno}}</td>
                  <td>{{$aluno->nome_aluno}}</td>
                  <td>{{$aluno->nome_mae}}</td>
                  <td>{{$aluno->data_nascimento}}</td>
                  <td><a class="btn btn-block btn-primary" href="{{route('declaracao.imprimir', $aluno->id)}}" target="_blank"></a></td>
                </tr>
              @endforeach
                </tbody>
                <tfoot>
                <tr>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>


@stop