<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title_prefix', config('adminlte.title_prefix', ''))
@yield('title', config('adminlte.title', 'AdminLTE 2'))
@yield('title_postfix', config('adminlte.title_postfix', ''))</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/Ionicons/css/ionicons.min.css') }}">

    @if(config('adminlte.plugins.select2'))
        <!-- Select2 -->
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css">
    @endif

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/AdminLTE.min.css') }}">

    @if(config('adminlte.plugins.datatables'))
        <!-- DataTables with bootstrap 3 style -->
        <link rel="stylesheet" href="//cdn.datatables.net/v/bs/dt-1.10.18/datatables.min.css">
    @endif

    @yield('adminlte_css')

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <!-- Meus estilos -->
    <style type="text/css">
    .nota{width: 30%!important}
    .nome_aluno{width: 20%!important}
    .upper{text-transform: uppercase!important}
    .select2_status_pagamento{width:42% !important}
    .center-text{text-align: center!important}
    .div-table{margin:auto; width: 90%}
    </style>
    
</head>
<body class="hold-transition @yield('body_class')">

@yield('body')

<script src="{{ asset('vendor/adminlte/vendor/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/vendor/jquery/dist/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery.mask.min.js') }}"></script>

@if(config('adminlte.plugins.select2'))
    <!-- Select2 -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
@endif

<!-- Minhas funcoes JS -->
<script src="{{ asset('js/funcoes.js') }}"></script>
<script type="text/javascript">
$(document).ready(function(){
    //Mascaras jQuery com mask
    $('.cpf').mask('000.000.000-00', {reverse: true});
    $('.telefone').mask('(00) 0 0000-0000', {reverse: false});
    $('.cep').mask('00000-000', {reverse: false});
    $('.dinheiro').mask('000.000.000.000.000,00', {reverse: true});
    $('.identidade').mask("#.##0-0", {reverse: true});
    $('.carga_horaria_m').mask("000 h", {reverse: true});
    $('.carga_horaria_s').mask("00 h", {reverse: true});
    $('.dias').mask("000 dias", {reverse: true});
    $('.pis').mask('000.00000.00-0', {reverse: true});
    $('.serie').mask('000-0', {reverse: true});
    $('.ctps').mask('0000000', {reverse: true});
    $('.nome').mask('AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', {'translation': {
        A: {pattern: /^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ'\s]+$/}
      }
    });
    //Personalizacao do Select2
    $('.select2_nivel').select2({placeholder: "Selecione um Nível"});
    $('.select2_ano').select2({placeholder: "Selecione um Ano"});
    $('.select2_professores').select2({placeholder: "Adicione Professores"});
    $('.select2_turno').select2({placeholder: "Selecione um Turno"});
    $('.select2_disciplina').select2({placeholder: "Selecione disciplinas"});
    $('.select2_responsavel').select2({placeholder: "Selecione um Responsável"});
    $('.select2_sexo').select2({placeholder: "Selecione um Sexo"});
    $('.select2_situacao').select2({placeholder: "Selecione uma Situação"});
    $('.select2_aluno').select2({placeholder: "Adicione Alunos"});
    $('.select2_estado_civil').select2({placeholder: "Estado Civil"});
    $('.select2_cargo').select2({placeholder: "Escolha um Cargo"});
    $('.select2_generico').select2({});
    $('.select2_cargo').select2({placeholder: "Selecione um Cargo"});
    $('.select2_status_pagamento').select2({});
    
    
    $('#example').DataTable();
    
});
</script>

@if(config('adminlte.plugins.datatables'))
    <!-- DataTables with bootstrap 3 renderer -->
    <script src="//cdn.datatables.net/v/bs/dt-1.10.18/datatables.min.js"></script>
    <script type="text/javascript">
        var value = $("#tabela").attr("pageLength");
        var pageLength,aaSorting;
        if (typeof value !== 'undefined') {
          pageLength = value*1;
        }
        
        var value = $("#tabela").attr("aaSorting");
        if (typeof value !== 'undefined') {
            aaSorting = value[0]*1;
        }

        var i;
        var order = "";
        if (typeof value !== 'undefined') {
            for(i=2; i<value.length; i++){
            order = order.concat(value[i]);
            }
        }
        
      $(document).ready(function() {
        $('table.tabela').DataTable({
            "bJQueryUI": true,
            "sPaginationType": "full_numbers",
            "pageLength": pageLength,
            "lengthMenu": [ [12, 24, 36, -1], [12, 24, 36, "All"] ],
            "oLanguage": {
                "sLengthMenu": "",
                //"sLengthMenu": "Mostrar _MENU_ registros por página",
                "sZeroRecords": "Nenhum registro encontrado",
                "sInfo": "Mostrando _START_ / _END_ de _TOTAL_ registro(s)",
                "sInfoEmpty": "Mostrando 0 / 0 de 0 registros",
                "sInfoFiltered": "(filtrado de _MAX_ registros)",
                "sSearch": "Pesquisar",
                "oPaginate": {
                    "sFirst": "Início",
                    "sPrevious": "Anterior",
                    "sNext": "Próximo",
                    "sLast": "Último"
                }
            },
            "aaSorting": [[aaSorting, order]],
            "aoColumnDefs": [
                {"orderable": false}
     
            ]
        });
    } );
    </script>
@endif

@if(config('adminlte.plugins.chartjs'))
    <!-- ChartJS -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js"></script>
@endif

@yield('adminlte_js')

</body>
</html>
