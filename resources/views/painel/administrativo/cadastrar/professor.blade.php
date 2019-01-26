@extends('adminlte::page')

@section('title', 'Painel Dashboard')

@section('content_header')
    <h1>Cadastro de Professor</h1>
@stop

@section('content')

<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Novo Professor</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form action="{{ route('cadastra_professor') }}" method="POST">
    {{csrf_field()}}
    @include('painel.administrativo.templates.layouts.formulario')
    <br>
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label>Disciplina</label>
            <select class="form-control select2_disciplina" multiple="multiple" name="id_disciplina[]" required>
              @foreach($disciplinas as $disciplina)
              <option value="{{ $disciplina->id }}">{{ $disciplina->nome_disciplina }}</option>
              @endforeach
            </select>
          </div>
        </div>
      </div>
    </div>
    <!-- /.box-body -->

    <div class="box-footer">
      <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
  </form>
  <br><br>
  <div class="box-header with-border">
    <h3 class="box-title">Professores cadastrados</h3>
  </div>  
  <div style=" margin:auto; width: 90%" >
    <table id="tabela" class="table tabela" pageLength='10' aaSorting='0 asc'>
    <thead>
      <tr>
        <th>Código</th>
        <th>Nome</th>
        <th>Disciplina</th>
      </tr>
    </thead>

    <tbody>
      @foreach($disciplinas_professores as $disciplina_professor)
      <tr>
        <td>{{ $disciplina_professor->codigo_professor }}</td>
        <td>{{ $disciplina_professor->nome_professor }}</td>
        <td>{{ $disciplina_professor->nome_disciplina }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
<br>
</div>

@stop