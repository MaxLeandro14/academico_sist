@extends('adminlte::page')

@section('title', 'Painel Dashboard')

@section('content_header')
    <h1>Cadastro de Professor</h1>
@stop

@section('content')
@include('painel.templates.mensagens')
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Novo Professor</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form action="{{ route('cadastra_professor') }}" method="POST">
    {{csrf_field()}}
    @include('painel.templates.formulario',['flag' => 'apenas_professor','nome_cargo' => 'Professor(a)'])
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
</div>

@stop