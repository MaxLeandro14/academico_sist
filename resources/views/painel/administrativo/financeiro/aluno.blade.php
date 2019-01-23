@extends('adminlte::page')

@section('title', 'Painel Dashboard')

@section('content_header')
    <h1>Alunos Matriculados</h1>
@stop

@section('content')


<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Alunos</h3>
  </div>  
  <div style=" margin:auto; width: 90%" >
    <table id="tabela" class="table tabela" pageLength='10' aaSorting='0 asc'>
    <thead>
      <tr>
        <th>Nome</th>
        <th>sexo</th>
        <th>CPF</th>
        <th>Contato</th>
        <th>Valor Matrícula</th>
      </tr>
    </thead>

    <tbody>
      @foreach($alunos as $aluno)
      <tr>
        <td><a href="{{ route('financeiro_aluno',$aluno->id) }}">{{ $aluno->nome_aluno }}</a></td>
        <td>{{ $aluno->sexo }}</td>
        <td>{{ $aluno->cpf }}</td>
        <td>{{ $aluno->fone }}</td>
        <td>{{ $aluno->valor_matricula }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
<br>
</div>



@stop