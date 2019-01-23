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
      <input required type="text" class="form-control telefone" placeholder="Telefone" name="fone">
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
      <input required type="text" maxlength="2" class="form-control" placeholder="UF Local de Nascimento" name="uf_local_nascimento" id="uf_local_nascimento" onkeypress="upper('uf_local_nascimento')" onkeyup="upper('uf')">
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
      <input required maxlength="2" type="text" class="form-control uf_orgao_emissor" placeholder="UF" name="uf_orgao_emissor" id="uf" onkeypress="upper('uf')" onkeyup="upper('uf')">
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
    <div class="col-md-4">
      <label for="">Carteira de reservista</label>
      <input required type="text"  class="form-control identidade" placeholder="Carteira de reservista" name="carteira_reservista">
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


