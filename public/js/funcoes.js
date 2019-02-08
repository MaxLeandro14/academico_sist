jQuery(function($){   

//Funcoes JS
$('#muda_bimestre').on('select2:select', function (e) {
    var bimestre = $('#muda_bimestre').val();
    var div_form1 = $("#div_bimestre_form1");
    var div_form2 = $("#div_bimestre_form2");
    var html = '<input type="hidden" name="bimestre" value="';
    html = html.concat(bimestre);
    html = html.concat('">');
    div_form1.html(html);
    div_form2.html(html);
    this.form.submit();
});

$('#salva_notas').on('click', function (e) {
    var bimestre = $('#muda_bimestre').val();
    var div_form2 = $("#div_bimestre_form2");
    var html = '<input type="hidden" name="bimestre" value="';
    html = html.concat(bimestre);
    html = html.concat('">');
    div_form2.html(html);
    this.form.submit();
});

$('#nivel').on('change', function (e) {
  var nivel = $("#nivel").val();
  var ano = $("#ano");
  
  if(nivel == 'Fundamental 1'){
  ano.html('<option></option><option>1° ano</option><option>2° ano</option><option>3° ano</option><option>4° ano</option><option>5° ano</option>');
  }if (nivel == 'Fundamental 2') {
  ano.html('<option></option><option>6° ano</option><option>7° ano</option><option>8° ano</option><option>9° ano</option>');
  }if (nivel == 'Médio') {
  ano.html('<option></option><option>1° ano</option><option>2° ano</option><option>3° ano</option>');
  }
});

$('#responsavel').on('change', function (e) {
  var responsavel = $("#responsavel").val();

  if($("#responsavel").val()== 'Pai' || $("#responsavel").val() == 'Mãe'){
    $("#responsavel_form").remove();
  }else
  {
   $("#master").html('<div id="responsavel_form"><hr><h4> Responsável pelo Aluno</h4><div class="row"><div class="col-md-3"><label for="">Nome</label><input required type="text" class="form-control upper nome" placeholder="Nome" name="outro_responsavel_nome"></div><div class="col-md-2"><label for="">Grau de parentesco</label><input required type="text" class="form-control upper nome" placeholder="Parentesco" name="outro_responsavel_parentesco"></div><div class="col-md-5"><label for="">Endereço</label><input  required type="text" class="form-control" placeholder="Endereço" name="outro_responsavel_endereco"></div><div class="col-md-2"><label for="">Telefone</label><input required type="text" class="form-control telefone" placeholder="Contato" name="outro_responsavel_telefone"></div></div></div>');
  }
});

$('#estado_civil').on('change', function (e) {
  
  if ($("#estado_civil").val() != 'Casado(a)') {
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
    $("#master_estado_civil").html('<div class="col-md-4" id="conjuge"><label for="">Cônjuge</label><input type="text" class="form-control upper nome" placeholder="Cônjuge" name="conjuge"></div>');
  }  

});    

   
});

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


