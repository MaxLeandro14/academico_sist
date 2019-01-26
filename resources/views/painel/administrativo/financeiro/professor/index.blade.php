@extends('adminlte::page')

@section('title', 'Painel Dashboard')

@section('content_header')
    <h1>Professores Matriculados</h1>
@stop

@section('content')


<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Professores</h3>
  </div>  
  <div style=" margin:auto; width: 90%" >
    <table id="tabela" class="table tabela" pageLength='10' aaSorting='0 asc'>
    <thead>
      <tr>
        <th>Nome</th>
        
      </tr>
    </thead>

    <tbody>
      @foreach($professores as $professor)
      <tr>
        <td><a href="{{ route('financeiro',$professor->id) }}">{{ $professor->nome_aluno }}</a></td>
        <td>{{ $professor->nome_professor }}</td>
        
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
<br>
</div>



@stop