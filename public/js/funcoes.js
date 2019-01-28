
function ano_serie()
{
  var nivel = document.getElementById('nivel');
  var ano = document.getElementById('ano');
  
  if(nivel.value == 'Fundamental 1'){
  ano.innerHTML = '<option>1° ano</option><option>2° ano</option><option>3° ano</option><option>4° ano</option><option>5° ano</option>';
  }if (nivel.value == 'Fundamental 2') {
  ano.innerHTML = '<option>6° ano</option><option>7° ano</option><option>8° ano</option><option>9° ano</option>';
  }if (nivel.value == 'Médio') {
  ano.innerHTML = '<option>1° ano</option><option>2° ano</option><option>3° ano</option>';
  }

  };

  function responsavel_aluno()
  {
    var responsavel = document.getElementById('responsavel');
    var master = document.getElementById('master');
  
    if(responsavel.value == 'Pai' || responsavel.value == 'Mãe'){
    $("#responsavel_form").remove();
    } else{
      master.innerHTML = '<div id="responsavel_form"><hr><h4> Responsável pelo Aluno</h4><div class="row"><div class="col-md-3"><label for="">Nome</label><input required type="text" class="form-control" placeholder="Nome" name="outro_responsavel_nome"></div><div class="col-md-2"><label for="">Grau de parentesco</label><input required type="text" class="form-control" placeholder="Parentesco" name="outro_responsavel_parentesco"></div><div class="col-md-5"><label for="">Endereço</label><input  required type="text" class="form-control" placeholder="Endereço" name="outro_responsavel_endereco"></div><div class="col-md-2"><label for="">Telefone</label><input required type="text" class="form-control" placeholder="Contato" name="outro_responsavel_telefone"></div></div></div>';
    }
  };

  function e_civil(){

  var estado_civil = document.getElementById('estado_civil');
  var master_estado_civil = document.getElementById('master_estado_civil');
  
  if (estado_civil.value != 'Casado(a)') {
    $("#conjuge").remove();
    $("#pai_estado_civil").removeClass("col-md-3");
    $("#mae_estado_civil").removeClass("col-md-3");
    $("#pai_estado_civil").addClass("col-md-5");
    $("#mae_estado_civil").addClass("col-md-5");
    
  }
  else{

    $("#pai_estado_civil").removeClass("col-md-5");
    $("#mae_estado_civil").removeClass("col-md-5");
    $("#pai_estado_civil").addClass("col-md-3");
    $("#mae_estado_civil").addClass("col-md-3");
    master_estado_civil.innerHTML = '<div class="col-md-4" id="conjuge"><label for="">Cônjuge</label><input type="text" class="form-control" placeholder="Cônjuge" name="conjuge"></div>';
  }

  };

  function add_require()
  {
    var status = document.getElementById('status');
    
    if (status.value == 'PAGO' ) {
      
      $("#data_pagamento").attr("required","");
    }
    else{
      $("#data_pagamento").removeAttr("required");
    }
  };


