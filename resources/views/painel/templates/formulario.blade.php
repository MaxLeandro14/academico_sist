<div class="box-body">
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label for="">Nome</label>
        <input required type="text" class="form-control" placeholder="Nome" name="nome">
      </div>
    </div>
    <div class="col-md-2">
      <div class="form-group">
        <label for="">Sexo</label>
        <select required class="form-control select2_sexo" name="sexo">
          <option></option>
          <option>M</option>
          <option>F</option>
        </select>
      </div>
    </div>
    <div class="col-md-4">
      <label for="">CPF</label>
      <input required type="text" class="form-control cpf" placeholder="CPF" name="cpf">
    </div>
  </div>

  <div class="row">
    <div class="col-md-4">
      <label for="">Telefone</label>
      <input required type="text" class="form-control telefone" placeholder="Telefone" name="telefone">
    </div>
    <div class="col-md-4">
      <label for="">Nacionalidade</label>
      <input required type="text" class="form-control telefone" placeholder="Nacionalidade" name="nacionalidade">
    </div>
    <div class="col-md-4">
      <label for="">Cidade</label>
      <input required type="text" class="form-control" placeholder="Cidade" name="cidade">
    </div>
  </div>

  <br>
  <div class="row">
    <div class="col-md-4">
      <label for="">CEP</label>
      <input required type="text" class="form-control cep" placeholder="CEP" name="cep">
    </div>
    <div class="col-md-8">
      <label for="">Endereço</label>
      <input required type="text" class="form-control" placeholder="Endereço" name="endereco">
    </div>
  </div>

  <br>
  <div class="row">
    <div class="col-md-4">
      <div class="form-group">
        <label for="">Data Nascimento</label>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
          <input required type="date" class="form-control" name="data_nascimento">
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <label for="">Local</label>
      <input required type="text" class="form-control" placeholder="Local de Nascimento" name="local_nascimento">
    </div>
    <div class="col-md-4">
      <label for="">UF</label>
      <input required type="text" maxlength="2" class="form-control" placeholder="UF Local de Nascimento" name="uf_local_nascimento" id="uf_local_nascimento" onkeypress="upper('uf_local_nascimento')" onkeyup="upper('uf_local_nascimento')">
    </div>
  </div>

  <br>
  <div class="row">
    <div class="col-md-4">
      <label for="">Identidade</label>
      <input required type="text" maxlength="21" class="form-control identidade" placeholder="Identidade" name="identidade">
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label for="">Data de Emissão</label>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
          <input required type="date" class="form-control" name="data_emissao_identidade">
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <label for="">Órgão Emissor</label>
      <input required type="text" class="form-control" placeholder="Órgão Emissor" name="orgao_emissor" id="orgao_emissor" onkeypress="upper('orgao_emissor')" onkeyup="upper('orgao_emissor')">
    </div>
    <div class="col-md-1">
      <label for="">UF</label>
      <input required maxlength="2" type="text" class="form-control" placeholder="UF" name="uf_orgao_emissor" id="uf" onkeypress="upper('uf')" onkeyup="upper('uf')">
    </div>
  </div>

  <br>
  <div class="row">
    <div class="col-md-4">
      <label for="">Título de Eleitor</label>
      <input required type="text"  class="form-control identidade" placeholder="Título de Eleitor" name="titulo_eleitor">
    </div>
    <div class="col-md-4">
      <label for="">Zona</label>
      <input required type="number" class="form-control" placeholder="Zona" name="zona">
    </div>
    <div class="col-md-4">
      <label for="">Seção</label>
      <input required type="number" class="form-control" placeholder="Seção" name="secao">
    </div>
  </div>

  <br>
  <div class="row">
    <div class="col-md-6">
      <label for="">Carteira de reservista</label>
      <input required type="text"  class="form-control identidade" placeholder="Carteira de reservista" name="carteira_reservista">
    </div>
    <div class="col-md-6">
      <label for="">Categoria</label>
      <input required type="text" class="form-control" placeholder="Categoria" name="categoria">
    </div>
  </div>

  <br>
  <div class="row">
    <div class="col-md-2">
      <label for="">CTPS</label>
      <input required type="text" class="form-control" placeholder="CTPS" name="ctps">
    </div>
    <div class="col-md-2">
      <label for="">Série</label>
      <input required type="text" class="form-control" placeholder="Série" name="serie_ctps">
    </div>
    <div class="col-md-2">
      <label for="">UF Emissão</label>
      <input required maxlength="2" type="text" class="form-control" placeholder="UF Emissão CTPS" name="uf_ctps" id="uf_ctps" onkeypress="upper('uf')" onkeyup="upper('uf')">
    </div>
    <div class="col-md-3">
      <div class="form-group">
        <label for="">Data Emissão</label>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
          <input required type="date" class="form-control" name="data_emissao_ctps">
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <label for="">PIS/PASEP</label>
      <input required type="text" class="form-control" placeholder="PIS/PASEP" name="pis_pasep">
    </div>
  </div>

  <br>
  <div class="row">
    <div class="col-md-3" id="pai_estado_civil">
      <label for="">Pai</label>
      <input required type="text" class="form-control" placeholder="Nome do Pai" name="nome_pai">
    </div>
    <div class="col-md-3" id="mae_estado_civil">
      <label for="">Mãe</label>
      <input required type="text" class="form-control" placeholder="Nome da Mãe" name="nome_mae">
    </div>
    <div class="col-md-2">
      <div class="form-group">
        <label for="">Estado Civil</label>
        <select required class="form-control select2_estado_civil" name="estado_civil" id="estado_civil"  onselect="e_civil()" onchange="e_civil()">
          <option></option>
          <option>Casado(a)</option>
          <option>Solteiro(a)</option>
          <option>Viúvo(a)</option>
        </select>
      </div>
    </div>
    <div id="master_estado_civil">
      <div class="col-md-4" id="conjuge">
        <label for="">Cônjuge</label>
        <input type="text" class="form-control" placeholder="Cônjuge" name="conjuge">
      </div>
    </div>
  </div>

  <br>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label for="">Nível de escolaridade</label>
        <select required class="form-control select2_generico" name="escolaridade">
          <option>Médio</option>
          <option>Superior</option>
          <option>Fundamental</option>
          <option>Pós-Graduação</option>
          <option>Mestrado</option>
        </select>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="">Grau de conclusão</label>
        <select required class="form-control select2_generico" name="grau_conclusao">
          <option>Completo</option>
          <option>Incompleto/Cursando</option>
        </select>
      </div>
    </div>
  </div>
  <br>
  <hr>
  <div class="row">
    <div class="col-md-4">
      <div class="form-group">
        <label for="">Data de Admissão</label>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
          <input required type="date" class="form-control" name="data_admissao">
        </div>
      </div>
    </div>
    <div class="col-md-2">
      <label for="">Salário</label>
      <div class="input-group">
        <span class="input-group-addon">R$</span>
        <input required type="text" class="form-control dinheiro" placeholder="00,00" name="salario">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="">Função</label>
        <select required class="form-control select2_cargo" name="id_cargo">
          @foreach ($cargos as $cargo)
          <option @if(isset($flag) && isset($nome_cargo) && $cargo->nome_cargo == $nome_cargo) selected @else disabled  @endif value="{{ $cargo->id }}">{{ $cargo->nome_cargo }}</option>
          @endforeach
        </select>
      </div>
    </div>
  </div>

  <br>
  <div class="row">
    <div class="col-md-3">
        <label for="">Carga horária Mensal</label>
        <input required type="text" class="form-control carga_horaria_m" placeholder="Carga Horária Mensal" name="carga_horaria_mensal">
    </div>
    <div class="col-md-3">
        <label for="">Carga horária Semanal</label>
        <input required type="text" class="form-control carga_horaria_s" placeholder="Carga Horária Mensal" name="carga_horaria_semanal">
    </div>
    <div class="col-md-3">
        <label for="">Contrato de Experiência de </label>
        <input required type="text" class="form-control" placeholder="Dias" name="dias_contrato">
    </div>
    <div class="col-md-3">
        <label for="">Prorrogado por mais </label>
        <input required type="text" class="form-control" placeholder="Dias de prorrogação" name="dias_prorrogacao">
    </div>
  </div>
  
  <br>
<div class="row" style="text-align: center;">
  <div class="col-md-12">
    <label>A EMPRESA E O CANDIDATO SE RESPONSABILIZAM PELAS INFORMAÇÕES ACIMA PRESTADAS</label>
  </div>
</div>