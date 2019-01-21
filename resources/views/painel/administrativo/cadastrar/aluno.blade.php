@extends('adminlte::page')

@section('title', 'Painel Dashboard')

@section('content_header')
    <h1>Cadastro de Aluno</h1>
@stop

@section('content')

<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Informações do Aluno</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form action="{{ route('cadastra_aluno') }}" method="POST">
    {{csrf_field()}}
    <div class="box-body">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="">Nome</label>
            <input type="text" class="form-control" placeholder="Nome do aluno" name="nome_aluno">
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">
            <label for="">Sexo</label>
            <select class="form-control select2_sexo" name="sexo">
              <option></option>
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
              <input type="date" class="form-control" placeholder="Data de início" name="data_nascimento">
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-4">
          <label for="">CPF</label>
          <input type="text" class="form-control cpf" placeholder="CPF" name="cpf">
        </div>
        <div class="col-md-4">
          <label for="">Fone</label>
          <input type="text" class="form-control telefone" placeholder="Contato" name="fone">
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="">Responsável</label>
            <select class="form-control select2_responsavel" name="pai_mae_responsavel" id="responsavel" onselect="responsavel_aluno()" onchange="responsavel_aluno()" >
              <option></option>
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
          <input type="text" class="form-control" placeholder="Bairro" name="bairro">
        </div>
        <div class="col-md-4">
          <label for="">Endereço</label>
          <input type="text" class="form-control" placeholder="Endereço" name="endereco">
        </div>
        <div class="col-md-4">
          <label for="">Cidade</label>
          <input type="text" class="form-control" placeholder="Cidade" name="cidade">
        </div>
      </div>

      <hr><h4> Informações do Pai</h4>
      <div class="row">
        <div class="col-md-4">
          <label for="">Nome</label>
          <input type="text" class="form-control" placeholder="Nome do Pai" name="nome_pai">
        </div>
        <div class="col-md-4">
          <label for="">Profissão</label>
          <input type="text" class="form-control" placeholder="Profissão" name="profissao_pai">
        </div>
        <div class="col-md-4">
          <label for="">Telefone Profissão</label>
          <input type="text" class="form-control telefone" placeholder="Contato" name="telefone_profissao_pai">
        </div>
      </div>

      <hr><h4> Informações da Mãe</h4>
      <div class="row">
        <div class="col-md-4">
          <label for="">Nome</label>
          <input type="text" class="form-control" placeholder="Nome da Mãe" name="nome_mae">
        </div>
        <div class="col-md-4">
          <label for="">Profissão</label>
          <input type="text" class="form-control" placeholder="Profissão" name="profissao_mae">
        </div>
        <div class="col-md-4">
          <label for="">Telefone Profissão</label>
          <input type="text" class="form-control telefone" placeholder="Contato" name="telefone_profissao_mae">
        </div>
      </div>
      <div id="master">
      <div id="responsavel_form">
        <hr><h4> Responsável pelo Aluno</h4>
        <div class="row">
          <div class="col-md-3">
            <label for="">Nome</label>
            <input type="text" class="form-control" placeholder="Nome do Responsável" name="outro_responsavel_nome">
          </div>
          <div class="col-md-2">
            <label for="">Grau de parentesco</label>
            <input type="text" class="form-control" placeholder="Grau de Parentesco" name="outro_responsavel_parentesco">
          </div>
          <div class="col-md-5">
            <label for="">Endereço</label>
            <input type="text" class="form-control" placeholder="Endereço" name="outro_responsavel_endereco">
          </div>
          <div class="col-md-2">
            <label for="">Telefone</label>
            <input type="text" class="form-control telefone" placeholder="Contato" name="outro_responsavel_telefone">
          </div>
        </div>
      </div>
    </div>
      <hr><h4> Informações da Escola</h4>
      <div class="row">
        <div class="col-md-4">
          <label for="">Nome</label>
          <input type="text" class="form-control" placeholder="Nome da Escola" name="colegio_procedencia">
        </div>
        <div class="col-md-4">
          <label for="">Cidade</label>
          <input type="text" class="form-control" placeholder="Cidade" name="cidade_colegio_procedencia">
        </div>
        <div class="col-md-2">
          <label for="">UF</label>
          <input type="text" class="form-control" placeholder="UF" name="uf_colegio_procedencia">
        </div>
        <div class="col-md-2">
          <label for="">CEP</label>
          <input type="text" class="form-control cep" placeholder="CEP" name="cep">
        </div>
      </div>

      <hr><h4> Matrícula do Aluno</h4>
      <div class="row">
        <div class="col-md-4">
          <label for="">Situação do Aluno</label>
          <select class="form-control select2_situacao" name="situacao_procedencia">
            <option></option>
            <option>Aprovado</option>
            <option>Reprovado</option>
            <option>Pendência</option>
            <option>Cursando</option>
            <option>Transferido</option>
          </select>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label for="">Data de Matrícula</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
              <input type="date" class="form-control" placeholder="Data de início" name="data_matricula">
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label for="">Data de Cancelamento</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
              <input type="date" class="form-control" placeholder="Data de início" name="data_cancelamento">
            </div>
          </div>
        </div>
        <div class="col-md-2">
          <label for="">Valor da Matrícula</label>
          <div class="input-group">
                <span class="input-group-addon">R$</span>
                <input type="text" class="form-control dinheiro" placeholder="00,00" name="valor_matricula">
              </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-4">
          <label for="">Valor da Mensalidade</label>
          <div class="input-group">
                <span class="input-group-addon">R$</span>
                <input type="text" class="form-control dinheiro" placeholder="00,00" name="valor_parcela">
              </div>
        </div>
        <div class="col-md-4">
        <div class="form-group">
          <label for="">Data do Pagamento</label>
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
            <input type="date" class="form-control" placeholder="Data de Pagamento" name="data_pagamento">
          </div>
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