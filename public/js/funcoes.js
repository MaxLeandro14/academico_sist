
function ano_nivel()
{
  var nivel = $("#nivel").val();
  var ano = $("#ano");
  
  if(nivel == 'Fundamental 1'){
  ano.html('<option>1° ano</option><option>2° ano</option><option>3° ano</option><option>4° ano</option><option>5° ano</option>');
  }if (nivel == 'Fundamental 2') {
  ano.html('<option>6° ano</option><option>7° ano</option><option>8° ano</option><option>9° ano</option>');
  }if (nivel == 'Médio') {
  ano.html('<option>1° ano</option><option>2° ano</option><option>3° ano</option>');
  }

  };

  function responsavel_aluno()
  {
    var responsavel = $("#responsavel").val();
    var master = $("#master");
  
    if(responsavel== 'Pai' || responsavel == 'Mãe'){
    $("#responsavel_form").remove();
    } else{
      master.html('<div id="responsavel_form"><hr><h4> Responsável pelo Aluno</h4><div class="row"><div class="col-md-3"><label for="">Nome</label><input required type="text" class="form-control" placeholder="Nome" name="outro_responsavel_nome"></div><div class="col-md-2"><label for="">Grau de parentesco</label><input required type="text" class="form-control" placeholder="Parentesco" name="outro_responsavel_parentesco"></div><div class="col-md-5"><label for="">Endereço</label><input  required type="text" class="form-control" placeholder="Endereço" name="outro_responsavel_endereco"></div><div class="col-md-2"><label for="">Telefone</label><input required type="text" class="form-control" placeholder="Contato" name="outro_responsavel_telefone"></div></div></div>');
    }
  };

  function e_civil(){

  var estado_civil = $("#estado_civil").val();
  var master_estado_civil = $("#master_estado_civil");
  
  if (estado_civil!= 'Casado(a)') {
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
    master_estado_civil.html('<div class="col-md-4" id="conjuge"><label for="">Cônjuge</label><input type="text" class="form-control upper" placeholder="Cônjuge" name="conjuge"></div>');
  }

  };

  function add_require(id_status)
  {
    
    var data_pagamento = "#data_pagamento-".concat(id_status);
    var status = $("#".concat(id_status)).val();
    
    if (status == 'PAGO' ) {
      
      $(data_pagamento).attr("required","");
    }
    else{
      $(data_pagamento).removeAttr("required");
    }

  };


