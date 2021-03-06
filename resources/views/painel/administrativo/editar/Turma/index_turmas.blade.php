@extends('adminlte::page')

@section('title', 'Painel Dashboard')

@section('content_header')
    <h1>Editar Turmas</h1>
@stop

@section('content')


<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Turmas cadastradas</h3>
  </div>  
  <div class="div-table">
    <table id="tabela" class="table tabela" pageLength='10' aaSorting='1 asc'>
    <thead>
      <tr>
        <th>Código</th>
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
        <td><a href="{{ route('edita_turma',$turma->id) }}">{{ $turma->codigo_turma }}</a></td>
        <td>{{ $turma->descricao }}</td>
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