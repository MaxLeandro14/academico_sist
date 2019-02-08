@if(isset($mostra_footer_header)) 
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Aluno - @if(isset($aluno->nome_aluno)) {{$aluno->nome_aluno }}@endif  </h3>
  </div>
@endif  
  <!-- /.box-header -->
<div class="box-body">
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label for="">Nome</label>
        <input required type="text" class="form-control upper" placeholder="Nome do aluno" name="nome_aluno" value="@if(isset($aluno->nome_aluno)){{ $aluno->nome_aluno }}@endif">
      </div>
    </div>
    <div class="col-md-2">
      <div class="form-group">
        <label for="">Sexo</label>
        <select required class="form-control select2_sexo" name="sexo">
          <option>@if(isset($aluno->sexo)){{ $aluno->sexo }}@endif</option>
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
          <input required type="date" class="form-control" placeholder="Data de início" name="data_nascimento" value="@if(isset($aluno->data_nascimento)){{ $aluno->data_nascimento }}@endif">
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-4">
      <label for="">CPF</label>
      <input required type="text" class="form-control cpf" placeholder="CPF" name="cpf" value="@if(isset($aluno->cpf)){{ $aluno->cpf }}@endif">
    </div>
    <div class="col-md-4">
      <label for="">Fone</label>
      <input required type="text" class="form-control telefone" placeholder="Contato" name="fone" value="@if(isset($aluno->fone)){{ $aluno->fone }}@endif">
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label for="">Responsável</label>
        <select required class="form-control select2_responsavel" name="pai_mae_responsavel" id="responsavel" onselect="responsavel_aluno()" onchange="responsavel_aluno()" >
          <option>@if(isset($aluno->pai_mae_responsavel)){{ $aluno->pai_mae_responsavel }}@endif</option>
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
      <input required type="text" class="form-control upper" placeholder="Bairro" name="bairro" value="@if(isset($aluno->bairro)){{ $aluno->bairro }}@endif">
    </div>
    <div class="col-md-5">
      <label for="">Endereço</label>
      <input required type="text" class="form-control" placeholder="Endereço" name="endereco" value="@if(isset($aluno->endereco)){{ $aluno->endereco }}@endif">
    </div>
    <div class="col-md-3">
      <label for="">Cidade</label>
      <input required type="text" class="form-control upper" placeholder="Cidade" name="cidade" value="@if(isset($aluno->cidade)){{ $aluno->cidade }}@endif">
    </div>
  </div>

  <hr><h4> Informações do Pai</h4>
  <div class="row">
    <div class="col-md-4">
      <label for="">Nome</label>
      <input required type="text" class="form-control upper" placeholder="Nome do Pai" name="nome_pai" value="@if(isset($aluno->nome_pai)){{ $aluno->nome_pai }}@endif">
    </div>
    <div class="col-md-4">
      <label for="">Profissão</label>
      <input required type="text" class="form-control upper" placeholder="Profissão" name="profissao_pai" value="@if(isset($aluno->profissao_pai)){{ $aluno->profissao_pai }}@endif">
    </div>
    <div class="col-md-4">
      <label for="">Telefone Profissão</label>
      <input required type="text" class="form-control telefone" placeholder="Contato" name="telefone_profissao_pai" value="@if(isset($aluno->telefone_profissao_pai)){{ $aluno->telefone_profissao_pai }}@endif">
    </div>
  </div>

  <hr><h4> Informações da Mãe</h4>
  <div class="row">
    <div class="col-md-4">
      <label for="">Nome</label>
      <input required type="text" class="form-control upper" placeholder="Nome da Mãe" name="nome_mae" value="@if(isset($aluno->nome_mae)){{ $aluno->nome_mae }}@endif">
    </div>
    <div class="col-md-4">
      <label for="">Profissão</label>
      <input required type="text" class="form-control upper" placeholder="Profissão" name="profissao_mae" value="@if(isset($aluno->profissao_mae)){{ $aluno->profissao_mae }}@endif">
    </div>
    <div class="col-md-4">
      <label for="">Telefone Profissão</label>
      <input required type="text" class="form-control telefone" placeholder="Contato" name="telefone_profissao_mae" value="@if(isset($aluno->telefone_profissao_mae)){{ $aluno->telefone_profissao_mae }}@endif">
    </div>
  </div>
  <div id="master">
    @if(isset($aluno->pai_mae_responsavel) && $aluno->pai_mae_responsavel  == 'Outro'))
  <div id="responsavel_form">
    <hr><h4> Responsável pelo Aluno</h4>
    <div class="row">
      <div class="col-md-3">
        <label for="">Nome</label>
        <input required type="text" class="form-control upper" placeholder="Nome do Responsável" name="outro_responsavel_nome" value="@if(isset($aluno->outro_responsavel_nome)){{ $aluno->outro_responsavel_nome }}@endif">
      </div>
      <div class="col-md-2">
        <label for="">Grau de parentesco</label>
        <input required type="text" class="form-control upper" placeholder="Grau de Parentesco" name="outro_responsavel_parentesco" value="@if(isset($aluno->outro_responsavel_parentesco)){{ $aluno->outro_responsavel_parentesco }}@endif">
      </div>
      <div class="col-md-5">
        <label for="">Endereço</label>
        <input required type="text" class="form-control" placeholder="Endereço" name="outro_responsavel_endereco" value="@if(isset($aluno->outro_responsavel_endereco)){{ $aluno->outro_responsavel_endereco }}@endif">
      </div>
      <div class="col-md-2">
        <label for="">Telefone</label>
        <input required type="text" class="form-control telefone" placeholder="Contato" name="outro_responsavel_telefone" value="@if(isset($aluno->outro_responsavel_telefone)){{ $aluno->outro_responsavel_telefone }}@endif">
      </div>
    </div>
  </div>
 @endif
</div>
  <hr><h4> Informações da Escola</h4>
  <div class="row">
    <div class="col-md-4">
      <label for="">Nome</label>
      <input required type="text" class="form-control upper" placeholder="Nome da Escola" name="colegio_procedencia" value="@if(isset($aluno->colegio_procedencia)){{ $aluno->colegio_procedencia }}@endif">
    </div>
    <div class="col-md-4">
      <label for="">Cidade</label>
      <input required type="text" class="form-control upper" placeholder="Cidade" name="cidade_colegio_procedencia" value="@if(isset($aluno->cidade_colegio_procedencia)){{ $aluno->cidade_colegio_procedencia }}@endif">
    </div>
    <div class="col-md-2">
      <label for="">UF</label>
      <select required class="form-control select2_generico" name="uf_colegio_procedencia">
        @if(isset($aluno->uf_colegio_procedencia))<option>{{ $aluno->uf_colegio_procedencia }}</option>@endif
        
        @if(isset($ufs))
        @foreach($ufs as $uf)
        <option value="{{$uf->UF}}">{{$uf->Estado}} - {{$uf->UF}}</option>
        @endforeach
        @endif
      </select>
    </div>
    <div class="col-md-2">
      <label for="">CEP</label>
      <input required type="text" class="form-control cep" placeholder="CEP" name="cep" value="@if(isset($aluno->cep)){{ $aluno->cep }}@endif">
    </div>
  </div>

  <hr><h4> Matrícula do Aluno</h4>
  <div class="row">
    <div class="col-md-4">
      <label for="">Situação do Aluno</label>
      <select required class="form-control select2_situacao" name="situacao_procedencia">
        @if(isset($aluno->situacao_procedencia))<option>{{ $aluno->situacao_procedencia }}</option>@endif
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
          <input required type="date"  class="form-control" placeholder="Data de início" name="data_matricula" value="@if(isset($aluno->data_matricula)){{ $aluno->data_matricula }}@endif">
        </div>
      </div>
    </div>
    <div class="col-md-2">
      <label for="">Valor da Matrícula</label>
      <div class="input-group">
            <span class="input-group-addon">R$</span>
            <input required type="text" class="form-control" placeholder="00,00" name="valor_matricula" value="@if(isset($aluno->valor_matricula)){{ $aluno->valor_matricula }}@endif">
          </div>
    </div>
    <div class="col-md-3">
      <label for="">Valor da Mensalidade</label>
      <div class="input-group">
            <span class="input-group-addon">R$</span>
            <input required type="text" class="form-control dinheiro" placeholder="00,00" name="valor_parcela" value="@if(isset($aluno->valor_parcela)){{ $aluno->valor_parcela }}@endif">
          </div>
    </div>
  </div>

@if(isset($mostra_footer_header)) 
</div>
    <!-- /.box-body -->
    <div class="box-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Voltar</button>
    </div>
@endif    
  