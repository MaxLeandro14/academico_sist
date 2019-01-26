@extends('adminlte::page')

@section('title', 'Painel Dashboard')

@section('content_header')
    <h1>Informações Financeiras</h1>
@stop

@section('content')

<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Informações de {{ $aluno->nome_aluno }} - <a  class="" data-toggle="modal" data-target="#modal_template" title="Mais Detalhes" href="{{ route('mostra_aluno',[$aluno->id,$aluno->nome_aluno]) }}">Mais detalhes</a></h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form action="" method="POST">
    {{csrf_field()}}
    <div class="box-body">
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label for="">Nome</label>
        <input required type="text" class="form-control" placeholder="Nome do aluno" name="nome_aluno" value="{{ $aluno->nome_aluno }}">
      </div>
    </div>
    <div class="col-md-2">
      <div class="form-group">
        <label for="">Sexo</label>
        <select required class="form-control select2_sexo" name="sexo">
          <option>{{ $aluno->sexo }}</option>
          <option>M</option>
          <option>F</option>
        </select>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label for="">Data Nascimento</label>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
          <input required type="date" class="form-control" placeholder="Data de início" name="data_nascimento" value="{{ $aluno->data_nascimento }}">
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-4">
      <label for="">CPF</label>
      <input required type="text" class="form-control cpf" placeholder="CPF" name="cpf" value="{{ $aluno->cpf }}">
    </div>
    <div class="col-md-4">
      <label for="">Fone</label>
      <input required type="text" class="form-control telefone" placeholder="Contato" name="fone" value="{{ $aluno->fone }}">
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label for="">Responsável</label>
        <select required class="form-control select2_responsavel" name="pai_mae_responsavel" id="responsavel" onselect="responsavel_aluno()" onchange="responsavel_aluno()" >
          <option>{{ $aluno->pai_mae_responsavel }}</option>
          <option>Pai</option>
          <option>Mãe</option>
          <option>Outro</option>
        </select>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-4">
      <label for="">Bairro</label>
      <input required type="text" class="form-control" placeholder="Bairro" name="bairro" value="{{ $aluno->bairro }}">
    </div>
    <div class="col-md-5">
      <label for="">Endereço</label>
      <input required type="text" class="form-control" placeholder="Endereço" name="endereco" value="{{ $aluno->endereco }}">
    </div>
    <div class="col-md-3">
      <label for="">Cidade</label>
      <input required type="text" class="form-control" placeholder="Cidade" name="cidade" value="{{ $aluno->cidade }}">
    </div>
  </div>
  <hr><h4> Matrícula do Aluno</h4>
  <div class="row">
    <div class="col-md-4">
      <label for="">Situação do Aluno</label>
      <select required class="form-control select2_situacao" name="situacao_procedencia">
        <option>{{ $aluno->situacao_procedencia }}</option>
        <option>Cursando</option>
        <option>Aprovado</option>
        <option>Reprovado</option>
      </select>
    </div>
    <div class="col-md-3">
      <div class="form-group">
        <label for="">Data de Matrícula</label>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
          <input required type="date"   class="form-control" placeholder="Data de início" name="data_matricula" value="{{ $aluno->data_matricula }}">
        </div>
      </div>
    </div>
    <div class="col-md-2">
      <label for="">Valor da Matrícula</label>
      <div class="input-group">
            <span class="input-group-addon">R$</span>
            <input required type="text" class="form-control" placeholder="00,00" name="valor_matricula" value="{{ $aluno->valor_matricula }}">
          </div>
    </div>
    <div class="col-md-3">
      <label for="">Valor da Mensalidade</label>
      <div class="input-group">
            <span class="input-group-addon">R$</span>
            <input required type="text" class="form-control dinheiro" placeholder="00,00" name="valor_parcela" value="{{ $aluno->valor_parcela }}">
          </div>
    </div>
  </div>
    
  <table id="tabela" class="table tabela" pageLength='6' aaSorting='0 asc'>
    <thead>
      <tr>
        <th>Mês</th>
        <th>Valor</th>
        <th>Status</th>
        <th>Data de Pagamento</th>
      </tr>
    </thead>

    <tbody>
      @foreach($parcelas as $parcela)
      <tr>
        <td> {{ $parcela->mes_parcela }} </td>
        <td> {{ $parcela->valor_parcela }} </td>
        <td>
          <select required class="form-control select2" name="status">
            <option>@if(isset($parcela->status)) {{$parcela->status}} @else PENDENTE @endif</option>
            <option>PENDENTE</option>
            <option>PAGO</option>
          </select>
          
        </td>
        <td> @if(!isset($parcela->data_pagamento)) Pendente @else {{$parcela->data_pagamento}} @endif </td>
      </tr>
      @endforeach
    </tbody>
  </table>

</div>
    <!-- /.box-body -->

    <div class="box-footer">
      <a type="button" href="{{ route('index_financeiro_aluno') }}" class="btn btn-default">Voltar</a>
    </div>
  </form>
</div>
@include('painel.administrativo.templates.layouts.modal')
@stop