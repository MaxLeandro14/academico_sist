@extends('adminlte::page')

@section('title', 'Painel Dashboard')

@section('content_header')
    <h1>Adicionar Alunos</h1>
@stop

@section('content')


<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Turmas cadastradas</h3>
  </div>  
  <div style=" margin:auto; width: 90%" >
    <table id="tabela" class="table tabela" pageLength='10' aaSorting='0 asc'>
    <thead>
      <tr>
        <th>id</th>
        <th>Descrição</th>
        <th>Série</th>
        <th>Ano</th>
        <th>Turno</th>
        <th>Ano Letivo</th>
      </tr>
    </thead>

    <tbody>
      @foreach($turmas as $turma)
      <tr>
        <td>{{ $turma->codigo_turma }}</td>
        <td><a href="{{ route('matricula_aluno',$turma->id) }}">{{ $turma->descricao }}</a></td>
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



@stop