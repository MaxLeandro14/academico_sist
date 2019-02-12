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
  <div class="box-body">
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label for="">Nome</label>
        <input disabled type="text" class="form-control" placeholder="Nome do aluno"  value="{{ $aluno->nome_aluno }}">
      </div>
    </div>
    <div class="col-md-2">
      <div class="form-group">
        <label for="">Sexo</label>
        <select disabled  class="form-control select2_sexo" >
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
          <input disabled  type="date" class="form-control" placeholder="Data de início" value="{{ $aluno->data_nascimento }}">
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-4">
      <label for="">CPF</label>
      <input disabled type="text" class="form-control cpf" placeholder="CPF" value="{{ $aluno->cpf }}">
    </div>
    <div class="col-md-4">
      <label for="">Fone</label>
      <input disabled type="text" class="form-control telefone" placeholder="Contato" value="{{ $aluno->fone }}">
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label for="">Responsável</label>
        <select disabled class="form-control select2_responsavel">
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
      <input disabled type="text" class="form-control" placeholder="Bairro" value="{{ $aluno->bairro }}">
    </div>
    <div class="col-md-5">
      <label for="">Endereço</label>
      <input disabled type="text" class="form-control" placeholder="Endereço" value="{{ $aluno->endereco }}">
    </div>
    <div class="col-md-3">
      <label for="">Cidade</label>
      <input disabled type="text" class="form-control" placeholder="Cidade" value="{{ $aluno->cidade }}">
    </div>
  </div>
  <hr><h4> Matrícula do Aluno</h4>
  <div class="row">
    <div class="col-md-4">
      <label for="">Situação do Aluno</label>
      <select disabled class="form-control select2_situacao">
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
          <input disabled type="date"   class="form-control" placeholder="Data de início"  value="{{ $aluno->data_matricula }}">
        </div>
      </div>
    </div>
    <div class="col-md-2">
      <label for="">Valor da Matrícula</label>
      <div class="input-group">
            <span class="input-group-addon">R$</span>
            <input disabled type="text" class="form-control" placeholder="00,00" value="{{ $aluno->valor_matricula }}">
          </div>
    </div>
    <div class="col-md-3">
      <label for="">Valor da Mensalidade</label>
      <div class="input-group">
            <span class="input-group-addon">R$</span>
            <input disabled type="text" class="form-control" placeholder="00,00" value="{{ $aluno->parcelas[0]->valor_parcela }}">
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
        <th>Ação</th>
      </tr>
    </thead>

    <tbody>
      @foreach($aluno->parcelas as $parcela)
      <tr>
        <!-- form start -->
        <form action="{{ route('financeiro_aluno_salva',[$parcela->id,$parcela->mes_parcela]) }}" method="POST">
        {{csrf_field()}}

        <td>{{ $parcela->mes_parcela }}</td>
        <td>{{ $parcela->valor_parcela }}</td>
        <td>
          <select required class="form-control select2_status_pagamento" id="{{$parcela->mes_parcela}}" name="status" onchange="add_require({{$parcela->mes_parcela}})" onselect="add_require({{$parcela->mes_parcela}})">
            @if($parcela->status == 'PAGO')
            <option>PAGO</option>
            <option>PENDENTE</option>
            @else
            <option>PENDENTE</option>
            <option>PAGO</option>
            @endif
          </select>         
        </td>
        <td> 
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
              <input id="data_pagamento-{{ $parcela->mes_parcela }}" type="date" class="form-control" placeholder="Data de início" name="data_pagamento" value="@if(isset($parcela->data_pagamento)){{ $parcela->data_pagamento }}@endif">
            </div>
          </div>
        </td>
        <td>
          <input type="hidden" name="id_aluno" value="{{ $aluno->id }}">
          <button type="submit" class="btn btn-primary" title="Salvar" ><i class="fa fa-floppy-o" aria-hidden="true"></i></button>
        </td>
        </form>
      </tr>
      @endforeach
    </tbody>
  </table>

</div>
  <!-- /.box-body -->
  <div class="box-footer">
    <a type="button" href="{{ route('index_financeiro_aluno') }}" class="btn btn-default">Voltar</a>
  </div>
</div>
@include('painel.templates.modal')
@stop