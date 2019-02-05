@extends('adminlte::page')

@section('title', 'Painel Dashboard')

@section('content_header')
<h1>Minhas Turmas</h1>
@stop

@section('content')
<div class="box box-primary">
  <!-- /.box-header -->
  <!-- form start -->
  <form role="form">
    <div class="box-body">
        <div class="box-header with-border">
          <h3 class="box-title">Minhas Turmas</h3>
        </div>  
        <table id="tabela" class="table tabela" pageLength='10' aaSorting='0 asc'>
        <thead>
          <tr>
            <th>Código</th>
            <th>Descrição</th>
            <th>Nível</th>
            <th>Ano</th>
            <th>Turno</th>
            <th>Ano Letivo</th>
            <th>Disciplina</th>
          </tr>
        </thead>
        @foreach($minhas_turmas as $minha_turma)
          <tr>
            <td><a href=" {{ route('turma',[$minha_turma->codigo_turma,$minha_turma->id_disciplina]) }} ">{{ $minha_turma->codigo_turma }}</a></td>
            <td>{{ $minha_turma->descricao }}</td>
            <td>{{ $minha_turma->nivel }}</td>
            <td>{{ $minha_turma->ano }}</td>
            <td>{{ $minha_turma->turno }}</td>
            <td>{{ $minha_turma->ano_letivo }}</td>
            <td>{{ $minha_turma->nome_disciplina }}</td>
          </tr>
        @endforeach

        <tbody>
        
        </tbody>
      </table>
    </div>
  </form>
</div>

@stop